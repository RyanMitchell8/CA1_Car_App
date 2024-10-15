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
        Nailpolish:: insert([
            ['model' => 'Volkswagen', 'type' => 'Golf', 'year' => 2020, 'created_at' => $currentTimestamp,
            'updated_at' => $currentTimestamp],]
        );
    }
}
