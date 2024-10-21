<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Car;
use Carbon\Carbon;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimestamp = Carbon::now();
        Car:: insert([
            ['model' => 'Volkswagen', 'type' => 'Golf R', 'year' => 2024, 'image_url' => 'VWGR.jfif', 'created_at' => $currentTimestamp,
            'updated_at' => $currentTimestamp],
            ['model' => 'BMW', 'type' => 'M5', 'year' => 2021, 'image_url' => 'BMWM5.jpg', 'created_at' => $currentTimestamp,
            'updated_at' => $currentTimestamp],
            ['model' => 'Ford', 'type' => 'Focus', 'year' => 2024, 'image_url' => 'FordF.jpg', 'created_at' => $currentTimestamp,
            'updated_at' => $currentTimestamp],
            ['model' => 'Jaguar', 'type' => 'F-Type', 'year' => 2020, 'image_url' => 'JFTYPE.webp', 'created_at' => $currentTimestamp,
            'updated_at' => $currentTimestamp],
            ['model' => 'Audi', 'type' => 'RS3', 'year' => 2022, 'image_url' => 'AUDIRS3.webp', 'created_at' => $currentTimestamp,
            'updated_at' => $currentTimestamp],
            ['model' => 'Toyota', 'type' => 'GT86', 'year' => 2024, 'image_url' => 'TGT86.avif', 'created_at' => $currentTimestamp,
            'updated_at' => $currentTimestamp],
            ['model' => 'Lamborghini', 'type' => 'Huracan', 'year' => 2015, 'image_url' => 'LAMBO.jpg', 'created_at' => $currentTimestamp,
            'updated_at' => $currentTimestamp],
            ['model' => 'Nissan', 'type' => 'GT-R', 'year' => 2020, 'image_url' => 'NISSAN.jpg', 'created_at' => $currentTimestamp,
            'updated_at' => $currentTimestamp],
            ['model' => 'Ford', 'type' => 'Mustang', 'year' => 2018, 'image_url' => 'FORDMUS.webp', 'created_at' => $currentTimestamp,
            'updated_at' => $currentTimestamp]]
        );
    }
}
