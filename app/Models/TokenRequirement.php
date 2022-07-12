<?php

namespace App\Models;

use App\Models\Gate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokenRequirement extends Model
{
    use HasFactory;
    protected $fillable = [
        'token_id', 'amount_required', 'gate_id'
    ];
    protected $hidden = ['id', 'created_at', 'updated_at', 'gate_id'];

    public function gate()
    {
        return $this->belongsTo(Gate::class);
    }
}
