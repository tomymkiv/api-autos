<?php

namespace Database\Seeders;

use App\Models\CarBrand;
use Http;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $brands = Http::get('https://argautos.com/api/v1/brands');
        $data = ['Toyota', 'Chevrolet', 'Ford', 'BMW'];

        for ($i = 1; $i <= count($data); $i++) {
            CarBrand::create([
                'name' => $data[$i],
                'logo' => 'logo',
                'external_id' => $i,
            ]);
        }
    }
}
