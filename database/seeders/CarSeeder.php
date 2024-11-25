<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\Garage;
use Carbon\Carbon;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimestamp = Carbon::now();
        $cars = [
            ['model' => 'Volkswagen', 'type' => 'Golf R', 'year' => 2024, 'image_url' => 'VWGR.jfif'],
            ['model' => 'BMW', 'type' => 'M5', 'year' => 2021, 'image_url' => 'BMWM5.jpg'],
            ['model' => 'Ford', 'type' => 'Focus', 'year' => 2024, 'image_url' => 'FordF.jpg'],
            ['model' => 'Jaguar', 'type' => 'F-Type', 'year' => 2020, 'image_url' => 'JFTYPE.webp'],
            ['model' => 'Audi', 'type' => 'RS3', 'year' => 2022, 'image_url' => 'AUDIRS3.webp'],
            ['model' => 'Toyota', 'type' => 'GT86', 'year' => 2024, 'image_url' => 'TGT86.avif'],
            ['model' => 'Lamborghini', 'type' => 'Huracan', 'year' => 2015, 'image_url' => 'LAMBO.jpg'],
            ['model' => 'Nissan', 'type' => 'GT-R', 'year' => 2020, 'image_url' => 'NISSAN.jpg'],
            ['model' => 'Ford', 'type' => 'Mustang', 'year' => 2018, 'image_url' => 'FORDMUS.webp']
        ];
        

        foreach ($cars as $carData)
        {
            $car = Car::create(array_merge($carData, ['created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp]));

            $garages = Garage::inRandomOrder()->take(2)->pluck('id');

            $car->garages()->attach($garages);
        }
    }
}
