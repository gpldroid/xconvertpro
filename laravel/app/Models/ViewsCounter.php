<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class ViewsCounter extends Model
{
    use HasFactory;

    protected $fillable = ['identifier', 'title', 'views'];

    static public function addPage(string $identifier, string $title)
    {
        $key = cacheKey($identifier);

        if (!Cache::has($key)) {
            $pageView = self::firstOrCreate([
                'identifier' => $identifier,
                'title' => $title
            ]);
            $pageView->increment('views');
            // Update the 'updated_at' timestamp
            $pageView->touch();
            // Set a cache key to prevent repeated counting within a certain interval
            Cache::put($key, true, now()->addMinutes(30));
        }
    }
}
