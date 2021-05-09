<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Category;
use App\Models\VideoYoutube;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'content', 'category_id', 'user_id', 'published', 'refused'
    ];


    //pour clé étrangère de Category dans Post : 1 post a 1 seule catégorie
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    //pour clé étrangère de User dans Post : 1 post a 1 seul créateur/modificateur/publicateur
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //pour la table pivot de clés étrangères de Imaage : relation o,n avec Post
    public function images(): BelongsToMany
    {
        return $this->belongsToMany(Image::class);
    }

    //pour la table pivot de clés étrangères de VideoYoutube : relation o,n avec Post
    public function videos(): BelongsToMany
    {
        return $this->belongsToMany(VideoYoutube::class, 'video_youtube_post');
    }
    //'video_youtube_post' car 'public function videos': videos n'est pas 
    //le vrai nom du lien créé par Laravel = table VideoYoutube = lien VideoYoutubes 
}
