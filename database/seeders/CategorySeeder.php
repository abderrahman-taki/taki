<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CategorySeeder extends Seeder
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

            $item = [
                'title' => $faker->title,
                ];
            array_push($data, $item);
        endfor;


        for ($i = 1; $i <= count($data); $i++) {
            $category = Category::create($data[$i-1]);
        }

    }
}
