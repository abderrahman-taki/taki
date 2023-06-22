<?php

namespace Database\Seeders;

use App\Models\Food;
use App\Models\Lunch;
use Illuminate\Database\Seeder;

class LunchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
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
            $lunch = Lunch::create($data[$i-1]);
        }
    }
}
