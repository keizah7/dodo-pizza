<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = ['title', 'removable'];

    public function getRemovableTextAttribute()
    {
        return $this->attributes['removable'] ? 'true' : 'false';
    }
}
