<?php

namespace Database\Seeders;

use App\Models\Pack;
use Str;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PackSeeder extends Seeder
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
                    'price'=>$faker->randomDigit,
                    'description'=> $faker->sentence,
                ];
            array_push($data, $item);
        endfor;


        for ($i = 1; $i <= count($data); $i++) {
            $food = Pack::create($data[$i-1]);
        }
    }
}
