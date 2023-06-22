<?php

namespace Database\Seeders;

use App\Models\Food;
use App\Models\FoodIngredient;
use App\Models\Ingredient;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class FoodIngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $data = [];

        for($i=0;$i<3;$i++):

        $food = Food::inRandomOrder()->first();
        $ingredient = Ingredient::inRandomOrder()->first();

            $item = [
                    'food_id'=> $food->id,
                    'ingredient_id'=>$ingredient->id,
                ];
            array_push($data, $item);
        endfor;


        for ($i = 1; $i <= count($data); $i++) {
            $food_ingredient = FoodIngredient::create($data[$i-1]);
        }
    }
}
