<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    public function sluggable()
       {
           return [
               'slug' => [
                   'source' => 'title'
               ]
           ];
       }

    public function Category(){
        return $this->belongsTo('App\Models\Category');

    }

    public function Cart(){
        return $this->hasMany('App\Models\Cart');

    }

    public function Pack(){
        return $this->hasMany('App\Models\Pack');

    }

    public function Ingredient(){
        return $this->hasMany('App\Models\Ingredient');

    }

    public function Breakfast(){
        return $this->hasMany('App\Models\Breakfast');

    }

    public function Lunch(){
        return $this->hasMany('App\Models\Lunch');

    }

    public function Dinner(){
        return $this->hasMany('App\Models\Dinner');
    }

    public function FoodIngredient(){
        return $this->hasMany('App\Models\FoodIngredient');
    }
}
