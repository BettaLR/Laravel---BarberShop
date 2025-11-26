<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Service::create([
            'name' => 'Corte de Cabello',
            'price' => 150.00,
            'duration' => 30,
            'is_active' => true,
        ]);

        \App\Models\Service::create([
            'name' => 'Afeitado',
            'price' => 100.00,
            'duration' => 20,
            'is_active' => true,
        ]);

        \App\Models\Service::create([
            'name' => 'Corte + Barba',
            'price' => 220.00,
            'duration' => 50,
            'is_active' => true,
        ]);

        \App\Models\Service::create([
            'name' => 'Tinte de Cabello',
            'price' => 350.00,
            'duration' => 90,
            'is_active' => true,
        ]);
    }
}
