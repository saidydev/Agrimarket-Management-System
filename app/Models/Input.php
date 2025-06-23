<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    protected $fillable = [
        'input_id',
        'user_id',
        'name',
        'price',
        'quantity',
        'photo'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
