<?php

namespace App\Observers;

use App\Models\Post;
use Filament\Actions\Action;
use Filament\Notifications\Notification;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function created(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "updated" event.
     */
    public function updated(Post $post): void
    {
        Notification::make()
            ->title('Post is updated')
            ->body($post->body)
            ->success()
            ->actions([
                Action::make('view')
                    ->button()
                    ->markAsRead(),
            ])
            ->sendToDatabase($post->getSubscribers());
    }

    /**
     * Handle the Post "deleted" event.
     */
    public function deleted(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "restored" event.
     */
    public function restored(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     */
    public function forceDeleted(Post $post): void
    {
        //
    }
}
