<?php

namespace App\Filament\App\Resources\Posts\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Textarea::make('content')
                    ->required()
                    ->columnSpanFull(),
                Toggle::make('is_published')
                    ->required(),
                // TextInput::make('user_id')
                //     ->hidden()
                //     ->numeric()
                //     ->default(auth()->id),

                //Option 1:
                // TextInput::make('user_id')
                //     ->hidden()
                //     ->numeric()
                //     ->default(auth()->id),
            ]);
    }
}
