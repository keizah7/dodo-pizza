<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['title', 'priority'];

    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}
