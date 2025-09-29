<?php

namespace App\Filament\App\Resources\Posts;

use App\Filament\App\Resources\Posts\Pages\CreatePost;
use App\Filament\App\Resources\Posts\Pages\EditPost;
use App\Filament\App\Resources\Posts\Pages\ListPosts;
use App\Filament\App\Resources\Posts\Pages\ViewPost;
use App\Filament\App\Resources\Posts\Schemas\PostForm;
use App\Filament\App\Resources\Posts\Schemas\PostInfolist;
use App\Filament\App\Resources\Posts\Tables\PostsTable;
use App\Models\Post;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return PostForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PostInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PostsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPosts::route('/'),
            'create' => CreatePost::route('/create'),
            'view' => ViewPost::route('/{record}'),
            'edit' => EditPost::route('/{record}/edit'),
        ];
    }
}
