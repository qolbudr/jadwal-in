<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Subject;

use Session;

class SubjectController extends Controller
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
        $data['subject'] = Subject::all();
        return view('subject', $data);
    }

    public function insert(Request $request) {
        $subject = new Subject();
        $subject->name = $request->name;
        $result = $subject->save();

        return $this->showMessage($result);
    }

    public function delete($id) {
        $subject = Subject::find($id);
        $result = $subject->delete();

        return $this->showMessage($result);
    }

    public function fetch($id) {
        $subject = Subject::find($id);

        return response()->json($subject);
    }

    public function edit(Request $request) {
        $subject = Subject::find($request->id);
        $subject->name = $request->name;
        $result = $subject->save();

        return $this->showMessage($result);
    }
}
