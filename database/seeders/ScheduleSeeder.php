<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Subject;

use App\Models\User;

use App\Models\Room;

use App\Models\Schedule;

use App\Models\Classes;

use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ["A10.01.01","Senin","07.00 - 09.30","Arsitektur dan Organisasi Komputer","3","S1 Teknik Informatika","2023A","34","Aditya Prapanca, S.T., M.Kom."],
            ["A10.01.01","Senin","09.30 - 12.00","Arsitektur dan Organisasi Komputer","3","S1 Teknik Informatika","2023B","34","Aditya Prapanca, S.T., M.Kom."],
            ["A10.01.01","Senin","13.00 - 15.30","Pemrograman Dasar","3","S1 Pendidikan Teknologi Informasi","2023A","35","Prof. Dr. Ekohariadi, M.Pd."],
            ["A10.01.01","Selasa","07.00 - 09.30","Arsitektur dan Organisasi Komputer","3","S1 Teknik Informatika","2023G","34","Aditya Prapanca, S.T., M.Kom."],
            ["A10.01.01","Selasa","09.30 - 12.00","Arsitektur dan Organisasi Komputer","3","S1 Teknik Informatika","2023H","34","Aditya Prapanca, S.T., M.Kom."],
            ["A10.01.01","Selasa","14.40 - 16.20","Pengantar Bisnis dan Manajemen","2","S1 Sistem Informasi","2023B","35","Ghea Sekar Palupi, S.Kom., M.I.M."],
            ["A10.01.01","Selasa","18.00 - 20.30","Arsitektur dan Organisasi Komputer","3","S1 Teknik Informatika","2023K","34","Ronggo Alit, M.M., M.T."],
            ["A10.01.01","Rabu","07.00 - 09.30","Arsitektur dan Organisasi Komputer","3","S1 Teknik Informatika","2023E","34","Aditya Prapanca, S.T., M.Kom."],
            ["A10.01.01","Rabu","07.00 - 09.30","Aljabar Linier dan Matriks","3","S1 Teknik Informatika","2023A","36","Dr. Yuni Yamasari, S.Kom., M.Kom."],
            ["A10.01.01","Rabu","09.30 - 12.00","Aljabar Linier dan Matriks","3","S1 Teknik Informatika","2023B","33","Dr. Yuni Yamasari, S.Kom., M.Kom."],
            ["A10.01.01","Rabu","14.40 - 17.10","Pengantar Teknologi Informasi","3","S1 Sistem Informasi","2023B","35","I Kadek Dwi Nuryana, S.T., M.Kom."],
            ["A10.01.01","Rabu","18.00 - 20.30","Aljabar Linier dan Matriks","3","S1 Teknik Informatika","2023E","34","Dr. Yuni Yamasari, S.Kom., M.Kom."],
            ["A10.01.01","Kamis","08.40 - 10.20","Arsitektur dan Organisasi Komputer","3","S1 Teknik Informatika","2023F","31","Aditya Prapanca, S.T., M.Kom."],
            ["A10.01.01","Kamis","09.30 - 12.00","Aljabar Linier dan Matriks","3","S1 Teknik Informatika","2023G","34","Dr. Yuni Yamasari, S.Kom., M.Kom."],
            ["A10.01.01","Kamis","15.30 - 18.00","Aljabar Linier dan Matriks","3","S1 Teknik Informatika","2023I","33","Paramitha Nerisafitra, S.ST., M.Kom."],
            ["A10.01.01","Kamis","18.00 - 20.30","Aljabar Linier dan Matriks","3","S1 Teknik Informatika","2023J","35","Paramitha Nerisafitra, S.ST., M.Kom."],
            ["A10.01.01","Kamis","20.30 - 22.10","Aljabar Linier dan Matriks","3","S1 Teknik Informatika","2023F","30","Paramitha Nerisafitra, S.ST., M.Kom."],
            ["A10.01.01","Jumat","08.40 - 10.20","Pengantar Bisnis dan Manajemen","2","S1 Sistem Informasi","2023A","35","Ghea Sekar Palupi, S.Kom., M.I.M."],
            ["A10.01.01","Jumat","13.00 - 15.30","Aljabar Linier dan Matriks","3","S1 Teknik Informatika","2023H","34","Paramitha Nerisafitra, S.ST., M.Kom."],
            ["A10.01.01","Jumat","18.00 - 21.20","Aljabar Linier dan Matriks","3","S1 Teknik Informatika","2023K","34","Paramitha Nerisafitra, S.ST., M.Kom."],
            ["A10.01.01","Jumat","20.30 - 22.10","Arsitektur dan Organisasi Komputer","3","S1 Teknik Informatika","2023I","33","Ronggo Alit, M.M., M.T."],
            ["A10.01.02","Senin","07.00 - 09.30","Aljabar Linier dan Matriks","3","S1 Sistem Informasi","2023A","35","Aries Dwi Indriyanti, S.Kom., M.Kom."],
            ["A10.01.02","Senin","13.00 - 15.30","Aljabar Linier dan Matriks","3","S1 Sistem Informasi","2023C","33","Aries Dwi Indriyanti, S.Kom., M.Kom."],
            ["A10.01.02","Selasa","09.30 - 11.10","Pengantar Bisnis dan Manajemen","2","S1 Sistem Informasi","2023E","33","Ghea Sekar Palupi, S.Kom., M.I.M."],
            ["A10.01.02","Selasa","15.30 - 18.00","Arsitektur dan Organisasi Komputer","3","S1 Teknik Informatika","2023J","35","Ronggo Alit, M.M., M.T."],
            ["A10.01.02","Rabu","07.00 - 09.30","Pengantar Teknologi Informasi","3","S1 Sistem Informasi","2023C","33","I Kadek Dwi Nuryana, S.T., M.Kom."],
            ["A10.01.02","Rabu","11.10 - 13.00","Pengantar Bisnis dan Manajemen","2","S1 Sistem Informasi","2023C","33","Ghea Sekar Palupi, S.Kom., M.I.M."],
            ["A10.01.02","Rabu","13.00 - 15.30","Pemrograman Dasar","3","S1 Pendidikan Teknologi Informasi","2023B","36","Prof. Dr. Ekohariadi, M.Pd."],
            ["A10.01.02","Rabu","15.30 - 18.00","Aljabar Linier dan Matriks","3","S1 Teknik Informatika","2023D","34","Paramitha Nerisafitra, S.ST., M.Kom."],
            ["A10.01.02","Kamis","07.00 - 09.30","Aljabar Linier dan Matriks","3","S1 Sistem Informasi","2023H","34","Aries Dwi Indriyanti, S.Kom., M.Kom."],
            ["A10.01.02","Kamis","09.30 - 12.00","Pengantar Teknologi Informasi","3","S1 Sistem Informasi","2023A","35","I Kadek Dwi Nuryana, S.T., M.Kom."],
            ["A10.01.02","Jumat","13.00 - 15.30","Pengantar Teknologi Informasi","3","S1 Sistem Informasi","2023D","32","I Kadek Dwi Nuryana, S.T., M.Kom."],
            ["A10.01.03","Senin","15.30 - 18.00","Arsitektur dan Organisasi Komputer","3","S1 Teknik Informatika","2023D","34","Aditya Prapanca, S.T., M.Kom."],
            ["A10.01.03","Rabu","13.50 - 15.30","Pengantar Bisnis dan Manajemen","2","S1 Sistem Informasi","2023D","38","Ghea Sekar Palupi, S.Kom., M.I.M."],
            ["A10.01.04","Senin","08.40 - 10.20","Teori Belajar","2","S1 Pendidikan Teknologi Informasi","2023C","36","Drs. Bambang Sujatmiko, M.T."],
            ["A10.01.04","Senin","13.00 - 15.30","Arsitektur dan Organisasi Komputer","3","S1 Teknik Informatika","2023C","34","Aditya Prapanca, S.T., M.Kom."],
            ["A10.01.04","Selasa","07.00 - 08.40","Teori Belajar","2","S1 Pendidikan Teknologi Informasi","2023A","35","Drs. Bambang Sujatmiko, M.T."],
            ["A10.01.04","Rabu","07.00 - 09.30","Matematika","3","S1 Teknik Informatika","2023B","33","Danang Ariyanto, S.Si., M.Si."],
            ["A10.01.04","Rabu","09.30 - 12.00","Aljabar Linier dan Matriks","3","S1 Sistem Informasi","2023E","33","Aries Dwi Indriyanti, S.Kom., M.Kom."],
            ["A10.01.04","Rabu","12.00 - 14.40","Pengantar Teknologi Informasi","3","S1 Sistem Informasi","2023E","33","I Kadek Dwi Nuryana, S.T., M.Kom."],
            ["A10.01.04","Kamis","09.30 - 12.00","Sistem Informasi Akuntansi","3","S1 Sistem Informasi","2023C","33","Ardhini Warih Utami, S.Kom., M.Kom."],
            ["A10.01.13","Senin","07.00 - 09.30","Aljabar Linier dan Matriks","3","S1 Teknik Informatika","2023F","","Paramitha Nerisafitra, S.ST., M.Kom."],
            ["A10.01.13","Selasa","07.00 - 08.40","Teori Belajar","2","S1 Pendidikan Teknologi Informasi","2023E","34","Drs. Bambang Sujatmiko, M.T."],
            ["A10.01.13","Selasa","08.40 - 10.20","Teori Belajar","2","S1 Pendidikan Teknologi Informasi","2023B","36","Drs. Bambang Sujatmiko, M.T."],
            ["A10.01.15","Senin","09.30 - 12.00","Sistem Informasi Akuntansi","3","S1 Sistem Informasi","2023E","33","Ardhini Warih Utami, S.Kom., M.Kom."],
            ["A10.01.15","Senin","13.00 - 15.30","Sistem Informasi Akuntansi","3","S1 Sistem Informasi","2023D","39","Ardhini Warih Utami, S.Kom., M.Kom."],
            ["A10.01.15","Rabu","07.00 - 08.40","Teori Belajar","2","S1 Pendidikan Teknologi Informasi","2023D","35","Drs. Bambang Sujatmiko, M.T."],
            ["A10.01.15","Kamis","13.00 - 15.30","Sistem Informasi Akuntansi","3","S1 Sistem Informasi","2023A","35","Ardhini Warih Utami, S.Kom., M.Kom."],
            ["A10.01.16","Rabu","09.30 - 12.00","Aljabar Linier dan Matriks","3","S1 Teknik Informatika","2023K","34","Paramitha Nerisafitra, S.ST., M.Kom."],
            ["A10.01.16","Kamis","09.30 - 12.00","Pemrograman Dasar","3","S1 Sistem Informasi","2023J","0","Dwi Fatrianto Suyatno, S.Kom., M.Kom."],
            ["A10.01.16","Jumat","08.40 - 11.10","Aljabar Linier dan Matriks","3","S1 Sistem Informasi","2023B","36","Aries Dwi Indriyanti, S.Kom., M.Kom."],
            ["A10.01.18","Selasa","07.00 - 09.40","Pengantar Bisnis dan Manajemen","2","S1 Sistem Informasi","2023B","35","Ghea Sekar Palupi"],
            ["A10.01.18","Selasa","14.40 - 17.10","Pemrograman Dasar","3","S1 Pendidikan Teknologi Informasi","2023C","36","Prof. Dr. Ekohariadi, M.Pd."],
            ["A10.01.18","Rabu","13.00 - 15.30","Pemrograman Dasar","3","S1 Sistem Informasi","2023A","35","Dwi Fatrianto Suyatno, S.Kom., M.Kom."],
            ["A10.01.19","Selasa","14.40 - 17.10","Sistem Informasi Akuntansi","3","S1 Sistem Informasi","2023B","35","Ardhini Warih Utami, S.Kom., M.Kom."],
            ["A10.01.19","Rabu","07.00 - 09.30","Matematika","3","S1 Teknik Informatika","2023F","31","Dr. Janet Trineke Manoy, M.Pd."],
            ["A10.03.03","Selasa","07.00 - 10.20","Pemrograman Dasar","4","S1 Teknik Informatika","2023A","37","Anita Qoiriah, S.Kom., M.Kom."],
            ["A10.03.03","Selasa","14.40 - 18.00","Pemrograman Dasar","4","S1 Teknik Informatika","2023B","34","Anita Qoiriah, S.Kom., M.Kom."],
            ["A10.03.03","Selasa","18.00 - 21.20","Pemrograman Dasar","4","S1 Teknik Informatika","2023C","34","Anita Qoiriah, S.Kom., M.Kom."],
            ["A10.03.03","Rabu","07.00 - 10.20","Pemrograman Dasar","4","S1 Teknik Informatika","2023D","34","Anita Qoiriah, S.Kom., M.Kom."],
            ["A10.03.03","Rabu","10.20 - 14.40","Pemrograman Dasar","4","S1 Teknik Informatika","2023E","34","Anita Qoiriah, S.Kom., M.Kom."],
            ["A10.03.03","Rabu","14.40 - 18.00","Pemrograman Dasar","4","S1 Teknik Informatika","2023F","32","Anita Qoiriah, S.Kom., M.Kom."],
            ["A10.03.03","Rabu","18.00 - 21.20","Pemrograman Dasar","4","S1 Teknik Informatika","2023G","34","Anita Qoiriah, S.Kom., M.Kom."],
            ["A10.03.03","Kamis","08.40 - 12.00","Pemrograman Dasar","4","S1 Teknik Informatika","2023H","34","Dr. Ricky Eka Putra, S.Kom., M.Kom."],
            ["A10.03.03","Kamis","13.00 - 16.20","Pemrograman Dasar","4","S1 Teknik Informatika","2023J","35","Dr. Ricky Eka Putra, S.Kom., M.Kom."],
            ["A10.03.03","Kamis","16.20 - 19.40","Pemrograman Dasar","4","S1 Teknik Informatika","2023K","34","Dr. Ricky Eka Putra, S.Kom., M.Kom."],
            ["A10.03.03","Jumat","08.40 - 11.10","Pemrograman Dasar","3","S1 Pendidikan Teknologi Informasi","2023E","34","Prof. Dr. Ekohariadi, M.Pd."],
            ["A10.03.03","Jumat","13.00 - 16.20","Pemrograman Dasar","4","S1 Teknik Informatika","2023I","33","Dr. Ricky Eka Putra, S.Kom., M.Kom."],
            ["A10.03.12","Senin","09.30 - 12.00","Pemrograman Dasar","3","S1 Sistem Informasi","2023B","35","Dwi Fatrianto Suyatno, S.Kom., M.Kom."],
            ["A10.03.12","Senin","13.00 - 15.30","Pemrograman Dasar","3","S1 Sistem Informasi","2023E","36","Dwi Fatrianto Suyatno, S.Kom., M.Kom."],
            ["A10.03.12","Senin","15.30 - 17.10","Pemrograman Dasar","3","S1 Sistem Informasi","2023H","34","Dwi Fatrianto Suyatno, S.Kom., M.Kom."],
            ["A10.03.12","Selasa","09.30 - 12.00","Pemrograman Dasar","3","S1 Sistem Informasi","2023G","30","Dwi Fatrianto Suyatno, S.Kom., M.Kom."],
            ["A10.03.12","Selasa","14.40 - 17.10","Pemrograman Dasar","3","S1 Sistem Informasi","2023D","34","Dwi Fatrianto Suyatno, S.Kom., M.Kom."],
            ["A10.03.12","Rabu","09.30 - 12.00","Pemrograman Dasar","3","S1 Sistem Informasi","2023F","33","Dwi Fatrianto Suyatno, S.Kom., M.Kom."],
            ["A10.03.12","Kamis","13.50 - 16.20","Pemrograman Dasar","3","S1 Sistem Informasi","2023I","35","Dwi Fatrianto Suyatno, S.Kom., M.Kom."],
            ["A10.03.12","Jumat","08.40 - 11.10","Pemrograman Dasar","3","S1 Sistem Informasi","2023C","41","Dwi Fatrianto Suyatno, S.Kom., M.Kom."],
            ["A10.04.05","Rabu","07.00 - 09.30","Matematika","3","S1 Teknik Informatika","2023H","34","Yuliani Puji Astuti, S.Si., M.Si."],
            ["A10.04.05","Rabu","10.20 - 13.00","Matematika","3","S1 Teknik Informatika","2023G","34","Ika Kurniasari, S.Pd., M.Pd."],
            ["A10.04.05","Rabu","13.00 - 15.30","Aljabar Linier dan Matriks","3","S1 Teknik Informatika","2023C","34","Paramitha Nerisafitra, S.ST., M.Kom."],
            ["A10.04.05","Kamis","08.40 - 11.10","Matematika","3","S1 Teknik Informatika","2023D","34","Dr. Nonik Indrawatiningsih, M.Pd."],
            ["A10.04.05","Kamis","13.00 - 15.30","Matematika","3","S1 Teknik Informatika","2023E","34","Dr. Janet Trineke Manoy, M.Pd."],
            ["A10.04.07","Kamis","08.40 - 11.10","Matematika","3","S1 Teknik Informatika","2023A","34","Danang Ariyanto, S.Si., M.Si."],
        ];

        DB::table('schedule')->truncate();

        foreach($data as $item) {
            $room = Room::where('name', 'like', $item[0].'%')->first();
            $subject = Subject::where('name', 'like', $item[3].'%')->first();
            $user = User::where('name', 'like', explode(' ', $item[8])[0].'%')->first();

            $classesId = 0;
            $classes = Classes::getAllWithProdi();
            foreach($classes as $class) {
                if(trim($class->prodi_name . ' ' . $class->class_name) == trim($item[5] . ' ' . $item[6])) {
                    $classesId = $class->class_id;
                }
            }

            $time = str_replace('.', ':', $item[2]);
            $time = explode(' - ', $time);

            // echo $room->id;
            // echo $subject->id;
            // echo $user->id;
            // echo $classesId;
            
            if($room != null && $subject != null && $user != null && $classesId != 0) {
                $schedule = new Schedule();
                $schedule->id_room = $room->id;
                $schedule->id_subject = $subject->id;
                $schedule->id_user = $user->id;
                $schedule->id_class = $classesId;
                $schedule->day = $item[1];
                $schedule->begin = $time[0];
                $schedule->end = $time[1];
                $schedule->student = $item[7] == '' ? 0 : $item[7];
                $schedule->save();
            }
        }
    }
}
