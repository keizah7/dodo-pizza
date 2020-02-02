<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['status', 'price', 'delivery_price', 'cart_price', 'client_id'];

    public function product()
    {
        return $this->belongsToMany(Product::class, 'order_products')->withTimestamps();
    }
}
