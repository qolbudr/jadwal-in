<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Prodi;

use Illuminate\Support\Facades\DB;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            "S1 Teknik Informatika",
            "S1 Sistem Informasi",
            "S1 Pendidikan Teknologi Informasi",
        ];
        
        DB::table('prodi')->truncate();
        
        foreach($data as $item) {
            $prodi = new Prodi();
            $prodi->name = $item;
            $prodi->save();
        }
    }
}
