<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    protected $primaryKey = 'input_id';

    public function getRouteKeyName()
    {
        return 'input_id';
    }

    protected $fillable = [
        'input_id',
        'user_id',
        'name',
        'price',
        'quantity',
        'photo'
    ];

    public function supplier() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
