<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'userName',
        'email',
        'password',
        'phoneNumber',
        'streetAddress',
        'postcode',
        'city',
        'country',
        'administrator',
        'gtc',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Pour clé étrangère dans Post
    //for foreign key in Post
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    //Pour clé étrangère dans Job
    //for foreign key in Job
    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }
}
