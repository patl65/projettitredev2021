<!-- Note : pour créer ce fichier on lance dans le terminal : 
php artisan make:migration create_foreign_key
aprés la création du fichier : le renommer de façon à ce qu'il soit toujours en dernier -->

<!-- Note2 : faire attention à l'ordre de création des tables et des foreign key -->



<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->constrained();
        });

        //crétion table pivot pour clé étrangère car 1 article peut avoir plusieurs photos
        //onDelete('cascade')->onUpdate('restrict') : pour mettre à jour automatiquement si supprimé ou modifié dans tables d'origine
        Schema::create('image_post', function (Blueprint $table) {
            $table->foreignId('image_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('post_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
        });

        //crétion table pivot pour clé étrangère car 1 article peut avoir plusieurs video
        //onDelete('cascade')->onUpdate('restrict') : pour mettre à jour automatiquement si supprimé ou modifié dans tables d'origine
        Schema::create('video_youtube_post', function (Blueprint $table) {
            $table->foreignId('video_youtube_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('post_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
        });

        Schema::table('jobs', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_post');
        Schema::dropIfExists('video_youtube_post');
    }
}
