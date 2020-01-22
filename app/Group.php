<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['title', 'priority', 'type_id'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
