<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackOrder extends Model
{
    use HasFactory;

    public function Client(){
        return $this->belongsTo('App\Models\Client');

    }

    public function Pack(){
        return $this->belongsTo('App\Models\Pack');

    }
}
