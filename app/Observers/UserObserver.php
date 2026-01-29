<?php

namespace App\Observers;

use App\Models\User;
use Maharlika\Database\Observers\Observer;

class UserObserver extends Observer
{
    /**
     * Handle the User "retrieved" event.
     */
    public function retrieved(User $model): void
    {
        
    }

    /**
     * Handle the User "creating" event.
     */
    public function creating(User $model): void
    {
        //
    }

    /**
     * Handle the User "created" event.
     */
    public function created(User $model): void
    {
        //
    }

    /**
     * Handle the User "updating" event.
     */
    public function updating(User $model): void
    {
        //
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $model): void
    {
        //
    }

    /**
     * Handle the User "saving" event.
     */
    public function saving(User $model): void
    {
        //
    }

    /**
     * Handle the User "saved" event.
     */
    public function saved(User $model): void
    {
        //
    }

    /**
     * Handle the User "deleting" event.
     */
    public function deleting(User $model): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $model): void
    {
        //
    }

    /**
     * Handle the User "restoring" event.
     */
    public function restoring(User $model): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $model): void
    {
        //
    }

    /**
     * Handle the User "replicating" event.
     */
    public function replicating(User $model): void
    {
        //
    }
}
