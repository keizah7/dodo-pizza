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

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
