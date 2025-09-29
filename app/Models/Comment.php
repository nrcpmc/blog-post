<?php

namespace App\Models;

use App\Observers\CommentObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Kirschbaum\Commentions\Comment as CommentionsComment;

#[ObservedBy(CommentObserver::class)]
class Comment extends CommentionsComment {}
