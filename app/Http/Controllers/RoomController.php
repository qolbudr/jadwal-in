<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Room;

use Session;

class RoomController extends Controller
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
        $data['room'] = Room::all();
        return view('room', $data);
    }

    public function insert(Request $request) {
        $found = Room::where('name', $request->name)->count();

        if($found > 0) {
            return $this->showMessage(false, 'Terjadi kesalahan data yang anda inputkan telah ada');
        }

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
        $found = Room::where('name', $request->name)->count();

        if($found > 0) {
            return $this->showMessage(false, 'Terjadi kesalahan data yang anda inputkan telah ada');
        }
        
        $room = Room::find($request->id);
        $room->name = $request->name;
        $room->capacity = $request->capacity;
        $result = $room->save();

        return $this->showMessage($result);
    }
}
