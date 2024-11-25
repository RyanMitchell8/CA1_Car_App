<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Garage;

class GarageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Garage::insert([
            ['name' => 'Dublin Auto Repair', 'address' => '15 Abbey Street, Dublin 1', 'image' => 'image1.jpg'],
            ['name' => 'Celtic Motors Garage', 'address' => '72 Greenfield Road, Galway City', 'image' => 'image2.jpg'],
            ['name' => 'Shannon Car Service', 'address' => '43 Limerick Road, Shannon, Co. Clare', 'image' => 'image3.jpg'],
            ['name' => 'Emerald Isle Garage', 'address' => '89 High Street, Cork City', 'image' => 'image4.jpg'],
            ['name' => 'Kilkenny Motor Works', 'address' => '24 Kilkenny Road, Kilkenny', 'image' => 'image5.jpg'],
        ]);
    }
}
