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
        'category_id',
        'name',
        'quantity',
        'quantity_type_id',
        'description',
        'price',
        'photo'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function quantityType()
    {
        return $this->belongsTo(QuantityType::class, 'quantity_type_id');
    }
}
