<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Room;

use Session;

class RoomController extends Controller
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
        $data['room'] = Room::all();
        return view('room', $data);
    }

    public function insert(Request $request) {
        $room = new Room();
        $room->name = $request->name;
        $room->capacity = $request->capacity;
        $result = $room->save();

        return $this->showMessage($result);
    }

    public function delete($id) {
        $room = Room::find($id);
        $result = $room->delete();

        return $this->showMessage($result);
    }

    public function fetch($id) {
        $room = Room::find($id);

        return response()->json($room);
    }

    public function edit(Request $request) {
        $room = Room::find($request->id);
        $room->name = $request->name;
        $room->capacity = $request->capacity;
        $result = $room->save();

        return $this->showMessage($result);
    }
}
