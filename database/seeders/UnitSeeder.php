<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->delete();

        $units = [
            'mmol/litre',
            'mmHg'
        ];

        foreach($units as $unitName) {
            Unit::create(['name' => $unitName]);
        }
    }
}
