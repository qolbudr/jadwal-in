<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Room;
use App\Models\Schedule;

class DashboardController extends Controller
{
    public function index() {
        if(Auth::user()) {
            return redirect()->to('/dashboard');
        } else {
            return redirect()->to('/login');
        }
    }

    public function dashboard() {
        $building = [];
        $allRoom = Room::all();

        foreach($allRoom as $room) {
            array_push($building, substr($room->name, 0, 3));
        } 

        $parsedBuilding = array_unique($building);

        $data = [
            'userCount' => User::count(),
            'roomCount' => Room::count(),
            'allBuilding' => $parsedBuilding,
        ];

        return view('dashboard', $data);
    }

    public function getSchedule() {
        $building = $_GET['gedung'];
        $response = Schedule::getTodayParsedWithBuilding($building);
        return response()->json($response);
    }

    public function getRoom() {
        $building = $_GET['gedung'];
        $response = Room::where('name', 'like', '%'.$building.'%')->get();
        return response()->json($response);
    }
}
