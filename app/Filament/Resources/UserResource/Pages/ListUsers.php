<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\PostResource\Widgets\PostsNumberPerMonthChart;
use App\Filament\Resources\UserResource;
use App\Filament\Resources\UserResource\Widgets\UserStatsWidget;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getFooterWidgets(): array
    {

        return [
            UserStatsWidget::class,
            PostsNumberPerMonthChart::class,
        ];
    }
}
