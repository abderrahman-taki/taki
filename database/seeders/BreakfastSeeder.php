<?php

namespace Database\Seeders;

use App\Models\Breakfast;
use App\Models\Food;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class BreakfastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $data = [];

        for($i=0;$i<5;$i++):

        $food = Food::inRandomOrder()->first();

            $item = [
                    'food_id'=> $food->id,
                ];
            array_push($data, $item);
        endfor;


        for ($i = 1; $i <= count($data); $i++) {
            $breakfast = Breakfast::create($data[$i-1]);
        }
    }
}
