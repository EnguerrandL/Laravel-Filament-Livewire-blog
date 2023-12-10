<?php

namespace App\Filament\Resources\GalleryResource\Pages;

use App\Filament\Resources\GalleryResource;
use App\Models\Gallery;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditGallery extends EditRecord
{
    protected static string $resource = GalleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                // ->after(function (Gallery $record) {
                //     // delete single
                //     if ($record->url) {
                //         Storage::disk('public')->delete($record->url);
                //     }

                //     if ($record->url === null || $record->getError()) {
                //         foreach ($record->url as $ph) Storage::disk('public')->delete($ph);
                //     }

                //     // delete multiple
                //     if ($record->url) {
                //         foreach ($record->url as $ph) Storage::disk('public')->delete($ph);
                //     }
                // }),
        ];
    }
}
