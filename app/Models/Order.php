<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function Client(){
        return $this->belongsTo('App\Models\Client');

    }
    
    public function Cart(){
        return $this->hasMany('App\Models\Cart');

    }

    public function OrdersCart(){
        return $this->hasMany('App\Models\OrdersCart');
    }
}
