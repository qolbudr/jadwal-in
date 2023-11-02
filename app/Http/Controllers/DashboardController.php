<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Room;

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
        $data = [
            'userCount' => User::count(),
            'roomCount' => Room::count(),
        ];
        return view('dashboard', $data);
    }
}
