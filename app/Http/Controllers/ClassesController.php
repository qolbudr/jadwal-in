<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Classes;

use App\Models\Prodi;

use Session;

class ClassesController extends Controller
{
    public function showMessage($result) {
        if($result) {
            Session::flash('success', 'Berhasil melakukan perintah');
        } else {
            Session::flash('success', 'Terjadi kesalahan');
        }

        return redirect()->back();
    }

    public function index() {
        $data['prodi'] = Prodi::all();
        $data['class'] = Classes::getAllWithProdi();
        return view('class', $data);
    }

    public function insert(Request $request) {
        $class = new Classes();
        $class->name = $request->name;
        $class->id_prodi = $request->id_prodi;
        $result = $class->save();

        return $this->showMessage($result);
    }

    public function delete($id) {
        $class = Classes::find($id);
        $result = $class->delete();

        return $this->showMessage($result);
    }

    public function fetch($id) {
        $class = Classes::find($id);

        return response()->json($class);
    }

    public function edit(Request $request) {
        $class = Classes::find($request->id);
        $class->name = $request->name;
        $class->id_prodi = $request->id_prodi;
        $result = $class->save();

        return $this->showMessage($result);
    }
}
