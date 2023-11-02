<?php

namespace Database\Seeders;

use App\Models\Building;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('building')->truncate();
        $building = new Building();
        $building->building_name = "A10";
        $building->save();
    }
}
