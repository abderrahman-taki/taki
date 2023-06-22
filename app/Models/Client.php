<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public function Customize(){
        return $this->hasMany('App\Models\Customize');

    }

    public function Cart(){
        return $this->hasMany('App\Models\Cart');

    }

    
}
