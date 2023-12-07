<?php

namespace App\Filament\Resources\CommentResource\Widgets;

use App\Filament\Resources\CommentResource;
use App\Models\Comment;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class DisplayLastCommentWidget extends BaseWidget

{

    protected int | string | array $columnSpan = 'full';
    public function table(Table $table): Table
    {
        return $table
            ->query(
               Comment::whereDate('created_at', '>', now()->subDay(14)),
            )
            ->columns([
                TextColumn::make('user.name')->searchable()->sortable(),
                TextColumn::make('post.title')->searchable()->label('Post Title')->sortable(),
                TextColumn::make('comment')->searchable()->sortable(),
                TextColumn::make('created_at')->searchable()->sortable(),
            ])
            ->actions([
                Action::make('View')
                ->url(fn (Comment $record) : string => CommentResource::getUrl('edit', ['record' => $record]))
            ]);
    }
}
