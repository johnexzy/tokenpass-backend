<?php

namespace App\Models;

use App\Models\Creator;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'type', 'creator_address'
    ];

    public function creator()
    {
        return $this->belongsTo(Creator::class, 'creator_address', 'address');
    }
    public function gate()
    {
        return $this->hasMany(Gate::class);
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            $item->slug = Str::slug($item->title);
        });
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'address';
    }
}
