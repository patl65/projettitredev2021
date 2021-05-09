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
        $posts = Post::with('category', 'videos', 'images')->where('published', 1)->orderBy('updated_at', 'desc')->get();
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


}
