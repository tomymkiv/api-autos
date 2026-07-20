<?php

namespace Database\Seeders;

use App\Models\CarBrand;
use App\Models\CarModel;
use App\Models\User;
use App\Models\VehicleBrand;
use App\Models\VehicleModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $url_car_brands = "https://argautos.com/api/v1/brands";
        $url_motos_brands = "https://argautos.com/api/v1/motos/brands";
        // 1. Obtener todas las marcas
        $data_brands = json_decode(file_get_contents($url_car_brands), true);
        $car_brands = $data_brands['data']; // solo para crear las marcas una vez

        $data_motos_brands = json_decode(file_get_contents($url_motos_brands), true);
        $motos_brands = $data_motos_brands['data']; // solo para crear las marcas una vez

        // 2. Sembrar todas las marcas primero
        // foreach ($motos_brands as $brand) {
        //     VehicleBrand::create([
        //         'name' => $brand['name'],
        //         'logo' => 'logo',
        //         'external_id' => $brand['id'],
        //     ]);
        // }
        $car_brands = VehicleBrand::all(); // al crear las marcas, tomo mis propias marcas para tener el external_id
        $motos_brands = VehicleBrand::all(); // al crear las marcas, tomo mis propias marcas para tener el external_id
        // 3. Por cada marca, obtener sus modelos y sembrarlos
        foreach ($motos_brands as $brand) {
            $brand_id_url = $brand['external_id']; // Usa el 'id' de la api donde traigo la info, guardado en mi api usando "external_id" (puede ser no secuencial: 1, 2, 64, 65, 70...)

            // dd($brand['id']);
            if ($brand['id'] > 93 && $brand['id'] <= 95) {
                // https://argautos.com/api/v1/motos/brands/1982/models
                $url_models = "https://argautos.com/api/v1/motos/brands/{$brand_id_url}/models";

                $data_models = json_decode(file_get_contents($url_models), true);

                // Si la marca no tiene modelos o la respuesta es inválida, se omite
                if (empty($data_models['data'])) {
                    echo "La marca {$brand['name']} no tiene modelos o la respuesta es inválida";
                    continue;
                }

                $models = $data_models['data'];

                foreach ($models as $model) {
                    VehicleModel::create([
                        'name' => $model['name'],
                        'brand_id' => $brand['id'],
                        'external_model_id' => $model['id'],
                    ]);
                }
            }
        }
    }
}