<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Schedule;

use App\Models\Subject;

use App\Models\Classes;

use App\Models\Room;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Session;

class ScheduleController extends Controller
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
        if(Auth::user()->nip == '2201006136') {
            $data['schedule'] = Schedule::getParsed();
        } else {
            $data['schedule'] = Schedule::getParsedByUserId(Auth::user()->id);            
        }

        $data['subject'] = Subject::all();
        $data['classes'] = Classes::getAllWithProdi();
        $data['room'] = Room::all();
        $data['user'] = User::all();
        return view('schedule', $data);
    }

    public function insert(Request $request) {
        $schedule = new Schedule();
        $schedule->id_room = $request->id_room;
        $schedule->id_user = $request->id_user;
        $schedule->id_subject = $request->id_subject;
        $schedule->id_class = $request->id_class;
        $schedule->day = $request->day;
        $schedule->begin = $request->begin;
        $schedule->end = $request->end;
        $schedule->student = $request->student;
        $result = $schedule->save();

        return $this->showMessage($result);
    }

    public function delete($id) {
        $schedule = Schedule::find($id);
        $result = $schedule->delete();

        return $this->showMessage($result);
    }

    public function fetch($id) {
        $schedule = Schedule::find($id);

        return response()->json($schedule);
    }

    public function edit(Request $request) {
        $schedule = Schedule::find($request->id);
        $schedule->id_room = $request->id_room;
        $schedule->id_user = $request->id_user;
        $schedule->id_subject = $request->id_subject;
        $schedule->id_class = $request->id_class;
        $schedule->day = $request->day;
        $schedule->begin = $request->begin;
        $schedule->end = $request->end;
        $schedule->student = $request->student;
        $result = $schedule->save();

        return $this->showMessage($result);
    }
}
