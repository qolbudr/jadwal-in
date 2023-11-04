<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Hash;

use Session;

class DosenController extends Controller
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
        $data['dosen'] = User::all();
        return view('dosen', $data);
    }

    public function insert(Request $request) {
        $user = new User();
        $user->name = $request->name;
        $user->nip = $request->nip;
        $user->password = Hash::make($request->nip);
        $user->phone = $request->phone;
        $result = $user->save();

        return $this->showMessage($result);
    }

    public function delete($id) {
        $user = User::find($id);
        $result = $user->delete();

        return $this->showMessage($result);
    }

    public function fetch($id) {
        $user = User::find($id);

        return response()->json($user);
    }

    public function edit(Request $request) {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->nip = $request->nip;
        $user->password = Hash::make($request->nip);
        $user->phone = $request->phone;
        $result = $user->save();

        return $this->showMessage($result);
    }
}
