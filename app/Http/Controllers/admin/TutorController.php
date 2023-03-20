<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Board;
use App\Models\Tutor;
use App\Models\SchoolBoard;
use Illuminate\Http\Request;
use App\Traits\Common_trait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TutorController extends Controller
{
    use Common_trait;

    public function index()
    {
        $all_info = Tutor::all();
        return view('admin.tutor.index', compact('all_info'));
    }

    public function add()
    {
        // $boards_info = Board::all();
        return view('admin.tutor.add');
        // return view('admin.tutor.add', compact('boards_info'));
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:.' . SCHOOL,
            'password' => 'required',
            'username' => 'required|unique:.' . SCHOOL,
            'icon' => 'required|image|mimes:jpg,jpeg,png',
            // 'boards' => 'required',
            'status' => 'required',
        ]);

        if ($request->file('icon') != '') {
            $img_name = time() . '-' . Str::of(md5(time() . $request->file('icon')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('icon')->extension();
            $request->file('icon')->storeAs('admin-assets/img/tutor/', $img_name);
        }
        $tutor = new Tutor();
        $tutor->fullname = $request->name;
        $tutor->username = $request->username;
        $tutor->email = $request->email;
        $tutor->password = Hash::make($request->password);
        $tutor->avatar = $img_name;
        $tutor->mobile = $request->mobile;
        $tutor->user_status = $request->status;
        $tutor->save();
        if ($tutor) {
            // if ($request->input('boards') != '') {
            //     $count = count($request->input('boards'));
            //     for ($i = 0; $i < $count; $i++) {
            //         $schoolboard = new SchoolBoard();
            //         $schoolboard->school_id = $tutor->id;
            //         $schoolboard->board_id = $request->boards[$i];
            //         $schoolboard->save();
            //     }
            // }
            return redirect()->route('tutor.list')->with('flash-success', 'Tutor added successfully');
        } else {
            return back()->with('flash-error', 'Error occured in adding data');
        }
    }


    public function edit($id = '')
    {
        // $single_info = Tutor::find($id)->with('schoolboards')->firstOrFail();
        $single_info = Tutor::find($id)->firstOrFail();
        // $boards_info = Board::all();
        // return view('admin.tutor.edit', compact('single_info', 'boards_info'));
        return view('admin.tutor.edit', compact('single_info'));
    }



    public function update(Request $request, $id = '')
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'icon' => 'image|mimes:jpg,jpeg,png',
            // 'boards' => 'required',
        ]);

        $school_edit = Tutor::findOrFail($id);
        if ($request->file('icon') != '') {
            $img_name = time() . '-' . Str::of(md5(time() . $request->file('icon')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('icon')->extension();
            $request->file('icon')->storeAs('admin-assets/img/tutor/', $img_name);
            if ($school_edit->avatar != '') {
                unlink(public_path('admin-assets/img/tutor/' . $school_edit->avatar));
            }
            $school_edit->avatar = $img_name;
        }
        $school_edit->fullname = $request->name;
        $school_edit->username = $request->username;
        $school_edit->email = $request->email;
        if ($request->password != '') {
            $school_edit->password = Hash::make($request->password);
        }
        $school_edit->mobile = $request->mobile;
        $school_edit->save();

        if ($school_edit) {
            // SchoolBoard::where('school_id', $school_edit->id)->delete();
            // if ($request->boards != '') {
            //     $count = count($request->boards);
            //     for ($i = 0; $i < $count; $i++) {
            //         $schoolboard = new SchoolBoard();
            //         $schoolboard->school_id = $school_edit->id;
            //         $schoolboard->board_id = $request->boards[$i];
            //         $schoolboard->save();
            //     }
            // }
            return redirect()->route('tutor.list')->with('flash-success', 'Tutor updated successfully');
        } else {
            return back()->with('flash-error', 'Error occured in updating data');
        }
    }

    public function status($id = '', $status = '')
    {
        $result = Tutor::findOrFail($id);
        $result->user_status = $status;
        $result->save();
        if ($result) {
            return back()->with('flash-success', 'Tutor status updated successfully.');
        } else {
            return back()->with('flash-error', 'Error occured in updating status.');
        }
    }
}
