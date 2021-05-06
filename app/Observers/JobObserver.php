<?php

namespace App\Observers;

use App\Models\Job;

class JobObserver
{
    /**
     * @param Job $job
     * @return void
     */
    public function created(Job $job): void
    {
        //
    }

    /**
     * @param Job $job
     * @return void
     */
    public function updated(Job $job): void
    {
        //
    }

    /**
     * @param Job $job
     * @return void
     */
    public function deleted(Job $job): void
    {
        //
    }

    /**
     * @param Job $job
     * @return void
     */
    public function restored(Job $job): void
    {
        //
    }

    /**
     * @param Job $job
     * @return void
     */
    public function forceDeleted(Job $job): void
    {
        //
    }
}
