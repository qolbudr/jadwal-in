<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Prodi;

use Session;

class ProdiController extends Controller
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
        return view('prodi', $data);
    }

    public function insert(Request $request) {
        $prodi = new Prodi();
        $prodi->name = $request->name;
        $result = $prodi->save();

        return $this->showMessage($result);
    }

    public function delete($id) {
        $prodi = Prodi::find($id);
        $result = $prodi->delete();

        return $this->showMessage($result);
    }

    public function fetch($id) {
        $prodi = Prodi::find($id);

        return response()->json($prodi);
    }

    public function edit(Request $request) {
        $prodi = Prodi::find($request->id);
        $prodi->name = $request->name;
        $result = $prodi->save();

        return $this->showMessage($result);
    }
}
