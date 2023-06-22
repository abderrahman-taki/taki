<?php

namespace Database\Seeders;

use App\Models\Food;
use App\Models\ImageVille;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(ClientSeeder::class);
        $this->call(TypeSortieSeeder::class);
        $this->call(RegionSeeder::class);
        $this->call(TypeReservationSeeder::class);
        $this->call(VilleSeeder::class);
        $this->call(GuideSeeder::class);
        $this->call(HotelSeeder::class);
        $this->call(PackTypeSeeder::class);
        $this->call(TourSeeder::class);
        $this->call(CircuitSeeder::class);
        $this->call(ReservationSeeder::class);
        $this->call(CircuitVilleSeeder::class);
        $this->call(SubsEmailSeeder::class);
        $this->call(ImageVilleSeeder::class);
        $this->call(ActiviteSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(IngredientSeeder::class);
        $this->call(FoodSeeder::class);
        $this->call(FoodIngredientSeeder::class);
        $this->call(PackSeeder::class);
        $this->call(BreakfastSeeder::class);
        $this->call(LunchSeeder::class);
        $this->call(DinnerSeeder::class);
        $this->call(DaySeeder::class);


    }
}
