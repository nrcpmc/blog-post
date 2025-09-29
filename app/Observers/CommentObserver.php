<?php

namespace App\Observers;

use App\Models\Comment;
use Filament\Actions\Action;
use Filament\Notifications\Notification;

class CommentObserver
{
    /**
     * Handle the Comment "created" event.
     */
    public function created(Comment $comment): void
    {
        Notification::make()
            ->title('New comment')
            ->body($comment->body)
            ->success()
            ->actions([
                Action::make('view')
                    ->button()
                    ->markAsRead(),
            ])
            ->sendToDatabase($comment->commentable->user);
    }

    /**
     * Handle the Comment "updated" event.
     */
    public function updated(Comment $comment): void
    {
        //
    }

    /**
     * Handle the Comment "deleted" event.
     */
    public function deleted(Comment $comment): void
    {
        //
    }

    /**
     * Handle the Comment "restored" event.
     */
    public function restored(Comment $comment): void
    {
        //
    }

    /**
     * Handle the Comment "force deleted" event.
     */
    public function forceDeleted(Comment $comment): void
    {
        //
    }
}
