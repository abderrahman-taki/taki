<?php

namespace Database\Seeders;

use App\Models\SubsEmail;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class SubsEmailSeeder extends Seeder
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
                    'Email'=>$faker->email,
                ];
            array_push($data, $item);
        endfor;


        for ($i = 1; $i <= count($data); $i++) {
            $subs_email = SubsEmail::create($data[$i-1]);
        }
    }
}
