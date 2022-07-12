<?php

namespace App\Models;

use App\Models\Item;
use App\Models\Gate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creator extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
    ];
    protected $hidden = ['id', 'created_at', 'updated_at'];
    public function items()
    {
        return $this->hasMany(Item::class, 'creator_address', 'address');
    }
    public function gate()
    {
        return $this->hasMany(Gate::class);
    }
}
