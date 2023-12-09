<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
    ];

    protected $casts = [
        'url' => 'array',
    ];



    public function galleryUrl(){

        $isUrl = str_contains($this->url, 'http');

        return ($isUrl) ? $this->url : Storage::url($this->url);
    }
}
