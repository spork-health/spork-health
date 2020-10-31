<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\MeasurementType;
use App\Models\Unit;

class MeasurementTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('measurement_types')->delete();

        $measurementTypes = [
            'Cholesterol' => 'mmol/litre',
            'Blood Pressure' => 'mmHg'
        ];

        foreach($measurementTypes as $typeName => $unitName) {
            $unitId = Unit::where('name', $unitName)->first()->id;

            MeasurementType::create([
                'name' => $typeName,
                'unit_id' => $unitId
            ]);
        }
    }
}
