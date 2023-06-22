<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ClientSeeder extends Seeder
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
                'last_name' => $faker->name,
                'first_name'=> $faker->name,
                'country'=> $faker->country,
                'city'=> $faker->city,
                'phone' => $faker->phoneNumber,
                'email' => $faker->email,
                ];
            array_push($data, $item);
        endfor;


        for ($i = 1; $i <= count($data); $i++) {
            $client = Client::create($data[$i-1]);
        }

    }
}
