<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_id',
        'farmer_id',
        'supplier_id',
        'input_id',
        'quantity',
        'price',
        'status',
    ];

    public function farmer()
    {
        return $this->belongsTo(User::class, 'farmer_id');
    }

    public function supplier()
    {
        return $this->belongsTo(User::class, 'supplier_id');
    }

    public function input()
    {
        return $this->belongsTo(Input::class, 'input_id');
    }
}

