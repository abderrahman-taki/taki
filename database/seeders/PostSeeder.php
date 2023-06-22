<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\TypeSortie;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
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
            $type_sortie = TypeSortie::inRandomOrder()->first();

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
                'en' => [
                    'titre' => "EN " .$faker->name,
                    'post_description' => "EN " .$faker->sentence,
                ],
                'fr' => [
                    'titre' => "FR " .$faker->name,
                    'post_description' => "FR " .$faker->sentence,
                ],
                'image' => "images/".$image_path,
                'type_sortie_id' => $type_sortie->id,
                ];
            array_push($data, $item);
        endfor;


        for ($i = 1; $i <= count($data); $i++) {
            $post = Post::create($data[$i-1]);
        }
    }
}
