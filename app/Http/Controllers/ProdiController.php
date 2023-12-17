<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Prodi;

use Session;

class ProdiController extends Controller
{
    public function showMessage($result, $message = null) {
        if($result) {
            Session::flash('success', $message == null ? 'Berhasil melakukan perintah' : $message);
        } else {
            Session::flash('error', $message == null ? 'Terjadi kesalahan' : $message);
        }

        return redirect()->back();
    }

    public function index() {
        $data['prodi'] = Prodi::all();
        return view('prodi', $data);
    }

    public function insert(Request $request) {
        $found = Prodi::where('name', $request->name)->count();

        if($found > 0) {
            return $this->showMessage(false, 'Terjadi kesalahan data yang anda inputkan telah ada');
        }

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
        $found = Prodi::where('name', $request->name)->count();

        if($found > 0) {
            if($found[0]->id != $request->id) {
                return $this->showMessage(false, 'Terjadi kesalahan data yang anda inputkan telah ada');
            }
        }

        $prodi = Prodi::find($request->id);
        $prodi->name = $request->name;
        $result = $prodi->save();

        return $this->showMessage($result);
    }
}
