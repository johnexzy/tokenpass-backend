<?php

namespace App\Models;
use App\Models\Item;
use App\Models\Creator;
use App\Models\TokenRequirement;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gate extends Model
{
    use HasFactory;

    protected $fillable = [
        'contract_address', 'token_standard', 'blockchain', 'token_requirements', 'creator', 'item_id'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function tokenRequirements(){
        return $this->hasMany(TokenRequirement::class);
    }
}
