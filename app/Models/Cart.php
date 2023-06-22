<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function Food(){
        return $this->belongsTo('App\Models\Food');

    }

    public function Client(){
        return $this->belongsTo('App\Models\Client');

    }

    
    public function Order(){
        return $this->hasMany('App\Models\Order');

    }
}
