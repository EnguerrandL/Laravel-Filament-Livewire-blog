<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'image',
        'body',
        'published_at',
        'featured'

    ];




    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function author()
    {

        return $this->belongsTo(User::class, 'user_id');
    }


    public function categories()
    {

        return $this->belongsToMany(Category::class);
    }


    public function likes()
    {
        return $this->belongsToMany(User::class, 'post_like')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
  


    public function scopePublished($query)
    {

        return $query->where('published_at', '<=', Carbon::now());
    }


    public function scopePopular($query)
    {

        return $query->withCount('likes')
        ->orderBy('likes_count', 'DESC');
    }


    public function scopeSearch($query, $search = '')
    {

        return $query->where('title', 'like', "%{$search}%");
    }


    public function scopeFeatured($query)
    {

        return $query->where('featured', true);
    }


    public function scopeWithCategory($query, string $category)
    {

        $query->whereHas('categories', function ($query) use ($category) {
            $query->where('slug', $category);
        });
    }



    public function getExcerpt()
    {
        return Str::limit(strip_tags($this->body), 150);
    }


    public function getReadingTime()
    {
        $mins =  round(str_word_count($this->body) / 250);

        return ($mins < 1) ? 1 : $mins;
    }


    public function getThumbnailImg()
    {
        $isUrl = str_contains($this->image, 'http');

        return ($isUrl) ? $this->image : Storage::url($this->image);
    }
}
