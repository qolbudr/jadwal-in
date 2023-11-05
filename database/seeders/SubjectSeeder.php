<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Subject;

use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            "Arsitektur dan Organisasi Komputer",
            "Pemrograman Dasar",
            "Pengantar Bisnis dan Manajemen",
            "Aljabar Linier dan Matriks",
            "Pengantar Teknologi Informasi",
            "Mata Kuliah",
            "Teori Belajar",
            "Matematika",
            "Sistem Informasi Akuntansi"
        ];

        DB::table('subject')->truncate();

        foreach($data as $item) {
            $subject = new Subject();
            $subject->name = $item;
            $subject->save();
        }
    }
}
