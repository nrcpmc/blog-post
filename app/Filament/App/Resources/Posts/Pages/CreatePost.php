<?php

namespace App\Filament\App\Resources\Posts\Pages;

use App\Filament\App\Resources\Posts\PostResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

    // Exposed from CreateRecord
    // second option instead of creating hidden input
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // it is just request merge.
        Arr::set($data, 'user_id', Auth::id());
        return $data;
    }
}
