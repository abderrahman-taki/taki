<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;
    
    public function Pack(){
        return $this->belongsTo('App\Models\Pack');

    }

    public function Breakfast(){
        return $this->belongsTo('App\Models\Breakfast');

    }

    public function Lunch(){
        return $this->belongsTo('App\Models\Lunch');

    }

    public function Dinner(){
        return $this->belongsTo('App\Models\Dinner');
    }
}
