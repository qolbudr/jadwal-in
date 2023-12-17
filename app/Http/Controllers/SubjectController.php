<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Subject;

use Session;

class SubjectController extends Controller
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
        $data['subject'] = Subject::all();
        return view('subject', $data);
    }

    public function insert(Request $request) {
        $found = Subject::where('name', $request->name)->count();

        if($found > 0) {
            return $this->showMessage(false, 'Terjadi kesalahan data yang anda inputkan telah ada');
        }

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
        $found = Subject::where('name', $request->name)->get();

        if(count($found) > 0) {
            if($found[0]->id != $request->id) {
                return $this->showMessage(false, 'Terjadi kesalahan data yang anda inputkan telah ada');
            }
        }

        $subject = Subject::find($request->id);
        $subject->name = $request->name;
        $result = $subject->save();

        return $this->showMessage($result);
    }
}
