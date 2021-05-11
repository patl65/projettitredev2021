<?php

namespace App\Http\Controllers\Site;

use App\Models\Post;
use App\Models\Image;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\VideoYoutube;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function showBlogByCategory(Category $category)
    {
        $categories = Category::all(); 
                $category->load(['posts' => function($q) {
            $q->where('published', 1)->orderBy('updated_at', 'desc');
        }]);
        //on recupérer les posts avec un affichage selon un critère et un classement et dans post il y a déjà photos et vidéos
        return view('pages.blogShowByCategory', ['categories' => $categories, 'category' => $category]);

    }


}
