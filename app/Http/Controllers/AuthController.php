<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Validator;

use Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $rules = [
            'nip'                   => 'required|integer',
            'password'              => 'required|string'
        ];

        $messages = [
            'nip.required'          => 'NIP wajib diisi',
            'nip.integer'           => 'NIP harus berupa angka',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            Session::flash('error', 'Silahkan cek inputan anda');
            return redirect()->back();
        }

        $data = [
            'nip'       => $request->input('nip'),
            'password'  => $request->input('password'),
        ];

        Auth::attempt($data, $request->input('remember'));

        if (Auth::check()) {
            return redirect()->to('/');
        } else {
            Auth::logout();
            Session::flash('error', 'Email atau password salah');
            return redirect()->back();
        }
    }
}
