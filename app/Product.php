<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = ['size_title', 'description', 'price', 'discount', 'priority', 'type_id', 'group_id', 'photo'];

    public function getShortDescriptionAttribute()
    {
        return Str::words($this->attributes['description'], 3);
    }

    public function ingredient()
    {
        return $this->belongsToMany(Ingredient::class, 'product_ingredients')->withTimestamps();
    }
}
