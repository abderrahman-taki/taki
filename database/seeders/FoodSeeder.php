<?php

namespace Database\Seeders;

use Str;
use App\Models\Category;
use App\Models\Food;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class FoodSeeder extends Seeder
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

        $category = Category::inRandomOrder()->first();
        $filepath = storage_path('app/public/images');
                if(!\File::exists($filepath)){
                    \File::makeDirectory($filepath, 0777, true);
                }
                $image_path = $faker->image(
                    $filepath,
                    450,
                    160,
                    null,
                    false);

            $item = [

                    'title'=>$faker->title,
                    'slug'=>Str::slug($faker->name),
                    'description'=> $faker->sentence,
                    'price'=>$faker->randomDigit,
                    'nbrOrder'=>$faker->randomDigit,
                    'calories'=>$faker->name,
                    'proteins'=> $faker->name,
                    'fats'=> $faker->name,
                    'carbohydrates'=> $faker->name,
                    'image_name'=>$faker->name,
                    'image'=> "images/".$image_path,
                    'category_id'=>$category->id,
                ];
            array_push($data, $item);
        endfor;


        for ($i = 1; $i <= count($data); $i++) {
            $food = Food::create($data[$i-1]);
        }
    }
}
