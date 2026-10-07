<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConvertsCounter extends Model
{
    use HasFactory;

    static public function incrementCounter()
    {
        $counter = self::firstOrCreate();
        if ($counter) {
            $counter->increment('count');
        }
    }
}
