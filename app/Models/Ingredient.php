<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    public function Food(){
        return $this->hasMany('App\Models\Food');

    }

    public function FoodIngredient(){
        return $this->hasMany('App\Models\FoodIngredient');
    }
}
