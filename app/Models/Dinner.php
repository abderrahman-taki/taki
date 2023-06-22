<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dinner extends Model
{
    use HasFactory;

    public function Day(){
        return $this->hasMany('App\Models\Day');

    }

    public function Food(){
        return $this->belongsTo('App\Models\Food');

    }
}
