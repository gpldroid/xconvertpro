<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $casts = [
        'published_at' => 'date',
    ];

    protected $fillable = [
        'title',
        'slug',
        'label',
        'topAd',
        'bottomAd',
        'showShareButtons',
        'content',
        'location',
        'metaDescription',
        'metaKeywords',
        'noIndex',
        'published_at',
    ];

    # https://stackoverflow.com/questions/59802926/laravel-cache-with-route-model-binding
    // public function resolveRouteBinding($value, $field = null): ?Model
    // {
    //     return Cache::rememberForever(
    //         cacheKey($value),
    //         fn () => $this->where('slug', $value)->firstOrFail()
    //     );
    // }
}
