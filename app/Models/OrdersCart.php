<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersCart extends Model
{
    use HasFactory;

    

    public function Cart(){
        return $this->belongsTo('App\Models\Cart');

    }

    public function Order(){
        return $this->belongsTo('App\Models\Order');

    }
}
