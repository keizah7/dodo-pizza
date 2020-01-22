<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['title', 'priority', 'type_id'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
