<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $table = 'schedule';

    public function getParsed() {
        $sql = Schedule::selectRaw('*, schedule.id as schedule_id, room.name as room_name, subject.name as subject_name, class.name as class_name, users.name as user_name, prodi.name as prodi_name')
                       ->join('room', 'schedule.id_room', '=', 'room.id')
                       ->join('subject', 'schedule.id_subject', '=', 'subject.id')
                       ->join('class', 'schedule.id_class', '=', 'class.id')
                       ->join('users', 'schedule.id_user', '=', 'users.id')
                       ->join('prodi', 'class.id_prodi', '=', 'prodi.id');
        return $sql->get();
    }

    public function getParsedByUserId($userId) {
        $sql = Schedule::selectRaw('*, schedule.id as schedule_id, room.name as room_name, subject.name as subject_name, class.name as class_name, users.name as user_name, prodi.name as prodi_name')
                       ->join('room', 'schedule.id_room', '=', 'room.id')
                       ->join('subject', 'schedule.id_subject', '=', 'subject.id')
                       ->join('class', 'schedule.id_class', '=', 'class.id')
                       ->join('users', 'schedule.id_user', '=', 'users.id')
                       ->join('prodi', 'class.id_prodi', '=', 'prodi.id')
                       ->where('users.id', $userId);
        return $sql->get();
    }

    public function getTodayParsed() {
        $dayInEnglish = [
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu',
            'Sunday' => 'Minggu'
        ];

        $today = date('l');

        $sql = Schedule::selectRaw('*, schedule.id as schedule_id, room.name as room_name, subject.name as subject_name, class.name as class_name, users.name as user_name, prodi.name as prodi_name')
                       ->join('room', 'schedule.id_room', '=', 'room.id')
                       ->join('subject', 'schedule.id_subject', '=', 'subject.id')
                       ->join('class', 'schedule.id_class', '=', 'class.id')
                       ->join('users', 'schedule.id_user', '=', 'users.id')
                       ->join('prodi', 'class.id_prodi', '=', 'prodi.id')
                       ->where('schedule.day', 'like', $dayInEnglish[$today].'%');
        return $sql->get();

    }
}
