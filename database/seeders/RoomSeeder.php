<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Room;

use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            ["A10",4,"A10.04.11",55],
            ["A10",4,"A10.04.09",90],
            ["A10",4,"A10.04.07",55],
            ["A10",4,"A10.04.05",55],
            ["A10",3,"A10.03.04",55],
            ["A10",3,"A10.03.03",55],
            ["A10",3,"A10.03.02",60],
            ["A10",1,"A10.01.19",100],
            ["A10",1,"A10.01.18",50],
            ["A10",1,"A10.01.17",60],
            ["A10",1,"A10.01.16",65],
            ["A10",1,"A10.01.15",70],
            ["A10",1,"A10.01.14",65],
            ["A10",1,"A10.01.13",55],
            ["A10",1,"A10.01.04",55],
            ["A10",1,"A10.01.03",65],
            ["A10",1,"A10.01.02",60],
            ["A10",1,"A10.01.01",70]
        ];
        
        DB::table('room')->truncate();

        foreach($datas as $data) {
            $room = new Room();
            $room->name = $data[2];
            $room->capacity = $data[3];
            $room->save();
        }
    }
}
