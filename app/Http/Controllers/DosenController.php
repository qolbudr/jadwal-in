<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Hash;

use Session;

class DosenController extends Controller
{
    public function showMessage($result, $message = null) {
        if($result) {
            Session::flash('success', $message == null ? 'Berhasil melakukan perintah' : $message);
        } else {
            Session::flash('success', $message == null ? 'Terjadi kesalahan' : $message);
        }

        return redirect()->back();
    }

    public function index() {
        $data['dosen'] = User::all();
        return view('dosen', $data);
    }

    public function insert(Request $request) {
        try {
            $user = new User();
            $user->name = $request->name;
            $user->nip = $request->nip;
            $user->password = Hash::make($request->nip);
            $user->phone = $request->phone;
            $result = $user->save();

            return $this->showMessage($result);
        } catch (Exception $e) {
            return $this->showMessage(false, 'Terjadi kesalahan data yang anda inputkan telah ada');
        }
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
        try {
            $user = User::find($request->id);
            $user->name = $request->name;
            $user->nip = $request->nip;
            $user->password = Hash::make($request->nip);
            $user->phone = $request->phone;
            $result = $user->save();

            return $this->showMessage($result);
        } catch (Exception $e) {
            return $this->showMessage(false, 'Terjadi kesalahan data yang anda inputkan telah ada');
        }
    }
}
