<?php

namespace App\Http\Controllers\Site;

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
    public function indexBlog()
    {
        $posts = Post::with('category', 'videos', 'images')->where('refused', 0)->where('published', 1)->orderBy('updated_at', 'desc')->get();
        $categories = Category::all(); //pour récupérer les infos qui ont des relations avec Post et pour les boutons
        return view('pages.blog', ['posts' => $posts, 'categories' => $categories]);
    }


    public function searchBlog(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'q' => 'required|string|min:3',
        ]);
        if ($validator->fails()) {
            return redirect()->route('blog.index')->withErrors($validator)->withInput();
        }

        $posts = Post::with('category', 'videos', 'images')->where('published', 1)->orderBy('updated_at', 'desc')->get();
        $categories = Category::all(); //pour récupérer les infos pour les boutons categories
        $q = request()->input('q');
        $posts = Post::where('title', 'like', "%$q%")
            ->orWhere('content', 'like', "%$q%")->get();

        return view('pages.blogSearch', ['posts' => $posts, 'categories' => $categories]);
    }


    public function showPostBlog(Post $post)
    {
        $categories = Category::all(); //pour récupérer les infos pour les boutons categories
        return view('pages.blogShowPost', ['post' => $post, 'categories' => $categories]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createExperience()
    {
        $categories = Category::all(); //pour la liste déroulante des catégories
        return view('pages.blogExperienceCreate', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeExperience(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'content' => 'required|string',
            'published' => 'string',
            'refused' => 'string',
        ]);
        if ($validator->fails()) {
            return redirect()->route('blog.experience.create')->withErrors($validator)->withInput();
        }
        $title = $request->input('title');
        $post = Post::create([
            //tests
            // 'category_id' => category()->name === "Expérience",
            // 'category_id' => $category->name === "Expérience",
            // 'category_id' => $request->name === "Expérience",
            // 'category_id' => $request->category === "Expérience",
            // 'category_id' => category->"Expérience",
            // 'category_id' => $category->"Expérience",

            // 'category_id' => $request->input('category'),
            'category_id' => 1,
            // 1 = Expérience
            'user_id' => auth()->user()->id,
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $request->input('content'),
            'published' => $request->input('published') ? true : false,
            'refused' => $request->input('refused') ? true : false
        ]);

        $this->addImagesExperience($request, $post);

        return redirect()->route('blog.index')->with('success', "Expérience réussie !! En attente de validation par notre administrateur");
    }

    private function addImagesExperience(Request $request, Post $post)
    {

        if ($request->file('images')) {
            //revient à si le input n'est pas vide
            foreach ($request->file('images') as $file) {
                if ($file) {
                    $fileName = 'exp-' . uniqid('picture') . $file->extension();
                    // les noms des fichiers photos = "exp-"+nom unique+l'extension du fichier dorigine
                    $image = Image::create([
                        'name' => $fileName
                    ]);
                    $file->storePubliclyAs('public/posts',  $fileName);
                    $post->images()->attach($image);
                }
            }
        }
    }
}
