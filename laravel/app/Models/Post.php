<?php

namespace App\Models;

use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements Viewable
{
    use HasFactory, InteractsWithViews;

    protected $removeViewsOnDelete = true;

    protected $casts = [
        'published_at' => 'date',
    ];

    protected $fillable = [
        'title',
        'slug',
        'topAd',
        'bottomAd',
        'showShareButtons',
        'content',
        'metaDescription',
        'metaKeywords',
        'snippet',
        'thumbnail',
        'published_at'
    ];

     # https://stackoverflow.com/questions/59802926/laravel-cache-with-route-model-binding
    //  public function resolveRouteBinding($value, $field = null): ?Model
    //  {
    //     return Cache::rememberForever(
    //         cacheKey($value),
    //         fn () => $this->where('slug', $value)->firstOrFail()
    //     );
    //  }
}

