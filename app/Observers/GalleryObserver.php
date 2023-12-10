<?php

namespace App\Observers;

use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class GalleryObserver
{



    public function saved(Gallery $gallery): void
    {
        if ($gallery->isDirty('url') && ($gallery->getOriginal('url') !== null)) {
            Storage::disk('public')->delete($gallery->getOriginal('url'));
        }
    }

    public function deleted(Gallery $gallery): void
    {
        if (!is_null($gallery->url)) {
            foreach ($gallery->url as $url) Storage::disk('public')->delete($url);
        }
    }
}
