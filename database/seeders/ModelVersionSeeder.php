<?php

namespace Database\Seeders;

use App\Models\VehicleModel;
use App\Models\VehicleVersion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModelVersionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $i = 0;
        // paso 1: traer todos los modelos de vehiculos existentes (incluyendo autos y motos)
        $vehicle_models = VehicleModel::all();

        // 2. itero por cada modelo
        foreach ($vehicle_models as $model) {
            // 3. obtengo el id de cada modelo

            // dump($model['id']);
            $vehicle_model_id = $model['id'];
            $vehicle_model = $model['name'];
            if ($vehicle_model_id >= 15) {
                // dump($vehicle_model);
                $url = "https://argautos.com/api/v1/models/{$vehicle_model_id}/versions";
                $data_models = json_decode(file_get_contents($url), true);
                $raw_models = $data_models['data'];

                foreach ($raw_models as $model) {
                    VehicleVersion::create([
                        'name' => $model['name'],
                        'vehicle_model_id' => $model['id'],
                        'body' => rand(1, 10),
                    ]);
                }
                dd("audi a3 hecho");
            }


            // armo la url para obtener las versiones del modelo
            // ej: https://argautos.com/api/v1/models/25/versions
            // deberia ser como: https://argautos.com/api/v1/models/{vehicle_model_id}/versions
            // $model_version = VehicleModel::find($vehicle_model_id);
            // dump($model_version);
            // if ($i < 3) {
            //     dd($raw_info);
            // }

            // $i++;
        }
    }
}