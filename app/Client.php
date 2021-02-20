<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'address', 'comment', 'delivery', 'pickup_id'];

    public function pickup() {
        return $this->belongsTo(Pickup::class);
    }
}
