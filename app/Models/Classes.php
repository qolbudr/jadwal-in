<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'class';

    public function getAllWithProdi() {
        return Classes::selectRaw('*, prodi.name as prodi_name, class.name as class_name, class.id as class_id')->join('prodi', 'prodi.id', '=', 'class.id_prodi')->get();
    }
}
