<?php

namespace App\Observers;

use App\Models\Article;

class ArticleObserver
{
    /**
     * @param Article $article
     * @return void
     */
    public function created(Article $article): void
    {
        //
    }

    /**
     * @param Article $article
     * @return void
     */
    public function updated(Article $article): void
    {
        //
    }

    /**
     * @param Article $article
     * @return void
     */
    public function deleted(Article $article): void
    {
        //
    }

    /**
     * @param Article $article
     * @return void
     */
    public function restored(Article $article): void
    {
        //
    }

    /**
     * @param Article $article
     * @return void
     */
    public function forceDeleted(Article $article): void
    {
        //
    }
}
