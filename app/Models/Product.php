<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'product_id';

    public function getRouteKeyName()
    {
        return 'product_id';
    }

    protected $fillable = [
        'product_id',
        'user_id',
        'name',
        'quantity',
        'description',
        'price',
        'photo'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
