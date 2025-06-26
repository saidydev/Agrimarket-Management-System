<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuantityType extends Model
{
    protected $fillable = ['name'];

    /**
     * Get the products associated with the quantity type.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
