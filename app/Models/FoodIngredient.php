<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodIngredient extends Model
{
    use HasFactory;

    public function Food(){
        return $this->belongsTo('App\Models\Food');

    }

    public function Ingredient(){
        return $this->belongsTo('App\Models\Ingredient');

    }
}
