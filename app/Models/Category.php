<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug'
    ];

//Pour clé étrangère dans Post
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class)->orderBy('updated_at', 'desc');
        // orderBy pour le shox category : afficher la liste des articles dans cet ordre
    }

}


