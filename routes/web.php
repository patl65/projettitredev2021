<?php

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Site\PostController as SitePostController;
use App\Http\Controllers\Site\CategoryController as SiteCategoryController;
use App\Http\Controllers\Site\JobController as SiteJobController;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('login', [LoginController::class, 'index'])->middleware('guest')->name('login');
//>middleware('guest') : pour détecter si l'user est déjà connecté
Route::post('login', [LoginController::class, 'login'])->name('auth.login');
Route::get('logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

//route pour le middleweare Admin que j'ai créé
Route::get('admin', function(){
    Route::get('', [CustomRequest::class, 'index']);
})->middleware('auth', 'admin');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    // Route::view('', 'pages.admin.console')->name('admin');
    Route::get('', function () {
        return view('pages.admin.dashboard');
    })->name('dashboard');
    Route::get('user', [UserAdminController::class, 'index'])->name('admin.user');
    Route::get('user/{user:id}/delete', [UserAdminController::class, 'destroy'])->name('admin.user.delete');
    Route::get('user/create', [UserAdminController::class, 'create'])->name('admin.user.create');
    Route::post('user', [UserAdminController::class, 'store'])->name('admin.user.store');
    Route::get('user/{user:id}', [UserAdminController::class, 'edit'])->name('admin.user.edit');
    //edit : route qui lance l'affichage pour l'update
    Route::post('user/{user:id}/update-email', [UserAdminController::class, 'updateEmail'])->name('admin.user.update.email');
    Route::post('user/{user:id}/update-password', [UserAdminController::class, 'updatePassword'])->name('admin.user.update.password');
    Route::post('user/{user:id}', [UserAdminController::class, 'update'])->name('admin.user.update');
    //ordre des pages importants : mettre en dernier avec ID car si non elles vont toutes demander l'ID et au départ je n'en avais pas mis sur update email et password
});


//pour le blog : pour les catégories
Route::group(['prefix' => 'admin/category', 'middleware' => 'auth'], function () {
    Route::get('', [CategoryController::class, 'index'])->name('category.index');
    Route::get('create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('', [CategoryController::class, 'store'])->name('category.store');
    Route::get('{category:slug}', [CategoryController::class, 'show'])->name('category.show');
    Route::get('{category:slug}/delete', [CategoryController::class, 'destroy'])->name('category.delete');
    //pour afficher le formulaire categorie et le mettre à jour
    Route::get('{category:slug}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    //pour afficher le formulaire categorie et le mettre à jour
    Route::post('{category:slug}', [CategoryController::class, 'update'])->name('category.update');
});

//pour le blog : pour les posts de l'admin
Route::group(['prefix' => 'admin/post', 'middleware' => 'auth'], function () {
    Route::get('', [PostController::class, 'index'])->name('post.index');
    Route::get('search', [PostController::class, 'search'])->name('post.index.search');
    //pour la barre de recherche
    Route::get('non-publie', [PostController::class, 'articleNonPublie'])->name('post.index.nonPublie');
    //pour le boutton qui affiche les articles non publiés
    Route::get('create', [PostController::class, 'create'])->name('post.create');
    Route::post('', [PostController::class, 'store'])->name('post.store');
    Route::get('{post:slug}', [PostController::class, 'show'])->name('post.show');
    Route::get('{post:slug}/delete', [PostController::class, 'destroy'])->name('post.delete');
    Route::get('{post:slug}/edit', [PostController::class, 'edit'])->name('post.edit');
    //pour afficher le formulaire categorie et le mettre à jour
    Route::post('{post:slug}', [PostController::class, 'update'])->name('post.update');
    Route::get('{post:slug}/deleteImage/{image}', [PostController::class, 'destroyImage'])->name('post.image.delete');
    Route::get('{post:slug}/deleteVideo/{video}', [PostController::class, 'destroyVideo'])->name('post.video.delete');
    //faire attention aux URL : que celà ne revienne pas au même {post:slug}/delete/{image} = {post:slug}/delete/{video}
});



//pour le blog : pour les pages visibles
Route::group(['prefix' => 'blog'], function () {
    Route::get('', [SitePostController::class, 'indexBlog'])->name('blog.index');
    Route::get('search', [SitePostController::class, 'searchBlog'])->name('blog.index.search');
    //pour la barre de recherche
    Route::get('post/{post:slug}', [SitePostController::class, 'showPostBlog'])->name('blog.post.show');
    Route::get('{category:slug}', [SiteCategoryController::class, 'showBlogByCategory'])->name('blog.category.show');
// TODO: voir notes

});





//pour la page contact avec l'envoit du mail
Route::get('/contact', [StaticController::class, 'contact'])->name('contact');
Route::post('/contact/send', [ContactController::class, 'contact'])->name('contact.send');


//pour les jobs
Route::group(['prefix' => 'admin/job', 'middleware' => 'auth'], function () {
    Route::get('', [JobController::class, 'index'])->name('job.index');
    Route::get('create', [JobController::class, 'create'])->name('job.create');
    Route::post('', [JobController::class, 'store'])->name('job.store');
    Route::get('{job:slug}', [JobController::class, 'show'])->name('job.show');
    Route::get('{job:slug}/delete', [JobController::class, 'destroy'])->name('job.delete');
    Route::get('{job:slug}/edit', [JobController::class, 'edit'])->name('job.edit');
    Route::post('{job:slug}', [JobController::class, 'update'])->name('job.update');
});

//pour les jobs : pour les pages visibles
Route::group(['prefix' => 'offres-emploi'], function () {
    Route::get('', [SiteJobController::class, 'indexJob'])->name('jobs.index');
    Route::get('search', [SiteJobController::class, 'searchJob'])->name('jobs.index.search');
    //pour la barre de recherche
    Route::get('{post:slug}', [SiteJobController::class, 'showJob'])->name('jobs.post.show');

});


//pour la mise en hébergement : la récup de la bdd, son initialisation et initialisation des clées at autres
if(app()->environment('install')) {
    Route::get('/install', function() {
        //pour que le site soit optimal
        //Artisan::call('key:generate');
        Artisan::call('package:discover');
        Artisan::call('vendor:publish', [
            '--all' => true
        ]);
        Artisan::call('config:cache');
        Artisan::call('route:cache');
        Artisan::call('view:cache');
        Artisan::call('optimize');
        Artisan::call('storage:link');
        //pour migrer la BDD sur l'hébergement du site
        Artisan::call('migrate:fresh', [
            '--seed' => true
        ]);

        return response()->json([
            'status' => 'ok'
        ]);
    });

    Route::get('/clear', function() {
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        Artisan::call('optimize:clear');
        Artisan::call('config:clear');
        Artisan::call('clear-compiled');
    });
}








//Pour exemple de traiements avec Post
//ex pour afficher en Json Post
Route::get('/test', function () {
    $posts = App\Models\Post::with('images', 'category', 'videos')->first();
    return $posts;
});
//ex pour afficher en Json les posts de la catégorie 'ex-ut'
Route::get('/test2', function () {
    $posts = App\Models\Category::with('posts')->where('slug', 'ex-ut')->get();
    return $posts;
});
//ex pour afficher en Json les posts d'1 catégorie selon son slug 
//pour le controller : mettre function()
Route::get('/test2/{category:slug}', function (Category $category) {
    $category->load('posts');
    return $category;
});
