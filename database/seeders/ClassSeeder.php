<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Classes;

use App\Models\Prodi;

use Illuminate\Support\Facades\DB;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ["S1 Teknik Informatika","2023A"],
            ["S1 Teknik Informatika","2023B"],
            ["S1 Pendidikan Teknologi Informasi","2023A"],
            ["S1 Teknik Informatika","2023G"],
            ["S1 Teknik Informatika","2023H"],
            ["S1 Sistem Informasi","2023B"],
            ["S1 Teknik Informatika","2023K"],
            ["S1 Teknik Informatika","2023E"],
            ["S1 Teknik Informatika","2023F"],
            ["S1 Teknik Informatika","2023I"],
            ["S1 Teknik Informatika","2023J"],
            ["S1 Sistem Informasi","2023A"],
            ["S1 Sistem Informasi","2023C"],
            ["S1 Sistem Informasi","2023E"],
            ["S1 Pendidikan Teknologi Informasi","2023B"],
            ["S1 Teknik Informatika","2023D"],
            ["S1 Sistem Informasi","2023H"],
            ["S1 Sistem Informasi","2023D"],
            ["S1 Pendidikan Teknologi Informasi","2023C"],
            ["S1 Teknik Informatika","2023C"],
            ["S1 Pendidikan Teknologi Informasi","2023E"],
            ["S1 Pendidikan Teknologi Informasi","2023D"],
            ["S1 Sistem Informasi","2023J"],
            ["S1 Sistem Informasi","2023G"],
            ["S1 Sistem Informasi","2023F"],
            ["S1 Sistem Informasi","2023I"],
        ];

        DB::table('class')->truncate();

        foreach($data as $item) {
            $prodi = Prodi::where('name', $item[0])->first();
            $class = new Classes();
            $class->id_prodi = $prodi->id;
            $class->name = $item[1];
            $class->save();
        }
    }
}
