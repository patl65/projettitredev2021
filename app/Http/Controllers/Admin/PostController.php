<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Image;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\VideoYoutube;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::with('user', 'category')->orderBy('updated_at', 'desc')->paginate(10);
        $posts = Post::with('user', 'category')->where('post->category->name','!=', 'Expérience')->orderBy('updated_at', 'desc')->paginate(10);
        //paginate : pour avoir le tableau sur plusieurs pages
        // debug(request()->user());
        //pour la barre de debug : on a notre page et le debug s'affiche dans la barre
        return view('pages.post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all(); //pour la liste déroulante des catégories
        return view('pages.post.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required|string',
            'title' => 'required|string',
            'content' => 'required|string',
            'published' => 'string',
        ]);
        if ($validator->fails()) {
            return redirect()->route('post.create')->withErrors($validator)->withInput();
        }
        $title = $request->input('title');
        $post = Post::create([
            'category_id' => $request->input('category'),
            'user_id' => auth()->user()->id,
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $request->input('content'),
            'published' => $request->input('published') ? true : false
        ]);

        $this->addVideos($request, $post);

        $this->addImages($request, $post);

        return redirect()->route('post.index')->with('success', "L'article a été créé");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('pages.post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all(); //pour la liste déroulante
        $videos = VideoYoutube::all(); //pour récupérer les vidéos Youtube
        $images = Image::all(); //pour récupérer les images
        return view('pages.post.update', ['post' => $post, 'categories' => $categories, 'videos' => $videos, 'images' => $images]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required|string',
            'title' => 'required|string',
            'content' => 'required|string',
            'published' => 'string',
        ]);
        if ($validator->fails()) {
            return redirect()->route('post.edit', $post->slug)->withErrors($validator)->withInput();
        }
        $title = $request->input('title');
        $published = $request->input('published') ? true : false;
        $post->update([
            'category_id' => $request->input('category'),
            'user_id' => auth()->user()->id,
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $request->input('content'),
            'published' => $published
        ]);

        $this->addVideos($request, $post);

        $this->addImages($request, $post);

        return redirect()->route('post.edit', $post->slug)->with('success', "L'article a été modifié");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        foreach ($post->images as $image) {
            Storage::disk('local')->delete('public/posts/' . $image->name);
        }
        $post->delete();
        return redirect()->route('post.index')->with('success', 'Article supprimé');
    }

    public function destroyImage(Post $post, Image $image)
    {
        $post->load('images');
        Storage::disk('local')->delete('public/posts/' . $image->name);
        $post->images()->detach($image);
        return redirect()->route('post.edit', $post->slug)->with('success', 'image supprimée');
    }

    public function destroyVideo(Post $post, VideoYoutube $video)
    {
        $post->load('videos');
        $post->videos()->detach($video);
        return redirect()->route('post.edit', $post->slug)->with('success', 'vidéo supprimée');
    }

    private function addVideos(Request $request, Post $post)
    {
        if ($request->input('video')) {
            //revient à si le input n'est pas vide
            $videos = explode(',', $request->input('video'));
            if (count($videos) > 0) {
                // $post->videos()->detach($post->videos);
                foreach ($videos as $video) {
                    $uri = trim($video);
                    if (Str::startsWith($uri, 'https://www.youtube.com/watch') || Str::startsWith($uri, 'https://youtube.com/watch')) {
                        parse_str(parse_url($video, PHP_URL_QUERY), $test);
                        $newVideo = VideoYoutube::create([
                            'link' => $test['v']
                        ]);
                        $post->videos()->attach($newVideo);
                    } else {
                        session()->flash('error', 'lien de vidéo invalide');
                    }
                }
            }
        }
    }


    private function addImages(Request $request, Post $post)
    {
        if ($request->file('images')) {
            //revient à si le input n'est pas vide
            foreach ($request->file('images') as $file) {
                if ($file) {
                    //$post->images()->detach($post->images);
                    //mis en comentaire car si non supprime les photos existantes por la nouvelle sélection dans la BDD
                    $image = Image::create([
                        'name' => $file->getClientOriginalName()
                        // ,'slug' => $file->getClientOriginalName()
                    ]);
                    $file->storePubliclyAs('public/posts', $file->getClientOriginalName());
                    $post->images()->attach($image);
                }
            }
        }
    }


    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'q' => 'required|string|min:3',
        ]);
        if ($validator->fails()) {
            return redirect()->route('post.index')->withErrors($validator)->withInput();
        }

        $q = request()->input('q');
        $posts = Post::where('title', 'like', "%$q%")
            ->orWhereHas('category', function ($query) use ($q) {
                $query->where('name', 'like', "%$q%");
            })
            ->orWhereHas('user', function ($query) use ($q) {
                $query->where('firstName', 'like', "%$q%")
                ->orWhere('lastName', 'like', "%$q%");
            })
            ->paginate(10);

        return view('pages.post.indexSearch')->with('posts', $posts);
    }

    public function articleNonPublie(Post $post){
        $posts = Post::where('published', 0)->paginate(10);
        return view('pages.post.indexNonPublie', ['posts' => $posts]);
    }


}
