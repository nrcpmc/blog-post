<?php

namespace App\Filament\App\Resources\Posts\Tables;

use App\Models\User;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Kirschbaum\Commentions\Filament\Actions\CommentsAction;
use Kirschbaum\Commentions\Filament\Actions\CommentsTableAction;
use Kirschbaum\Commentions\Filament\Actions\SubscriptionTableAction;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            // you can query here but
            // ->query()
            ->columns([
                Stack::make([
                    TextColumn::make('title')
                        ->searchable(),
                    TextColumn::make('user_id')
                        ->numeric()
                        ->sortable(),
                    TextColumn::make('updated_at')
                        // ->formatStateUsing(function ($record) {
                        //     return $record->diffForHumans();
                        // })
                        ->since()
                        // ->dateTime()
                        ->sortable()
                        ->toggleable(isToggledHiddenByDefault: true),
                ]),

            ])
            ->contentGrid([
                'md' => 2,
                'xl' => 2,
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                CommentsAction::make()
                    ->mentionables(User::all()),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
