<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'type',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            $item->slug = Str::slug($item->title);
        });
    }
}
