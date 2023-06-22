<?php

namespace Database\Seeders;

use App\Models\Breakfast;
use App\Models\Day;
use App\Models\Dinner;
use App\Models\Lunch;
use App\Models\Pack;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $data = [];

        for($i=0;$i<10;$i++):

        $breakfast = Breakfast::inRandomOrder()->first();
        $lunch = Lunch::inRandomOrder()->first();
        $dinner = Dinner::inRandomOrder()->first();
        $pack = Pack::inRandomOrder()->first();

            $item = [
                'title'=>$faker->name,
                'pack_id'=>$pack->id,
                'breakfast_id'=>$breakfast->id,
                'lunch_id'=>$lunch->id,
                'dinner_id'=> $dinner->id,
                ];
            array_push($data, $item);
        endfor;


        for ($i = 1; $i <= count($data); $i++) {
            $day = Day::create($data[$i-1]);
        }
    }
}
