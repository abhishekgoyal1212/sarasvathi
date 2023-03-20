<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Board;
use App\Models\School;
// use App\Models\SchoolBoard;
use Illuminate\Http\Request;
use App\Traits\Common_trait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SchoolController extends Controller
{
    use Common_trait;

    public function index()
    {
      
        $all_info = School::all();
        return view('admin.school.index', compact('all_info'));
    }

    public function add()
    {
        // $boards_info = Board::all();
        // return view('admin.school.add', compact('boards_info'));
        return view('admin.school.add');
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
            $request->file('icon')->storeAs('admin-assets/img/school/', $img_name);
        }
        $school = new School();
        $school->fullname = $request->name;
        $school->username = $request->username;
        $school->email = $request->email;
        $school->reg_no = $request->reg_no;
        $school->password = Hash::make($request->password);
        $school->avatar = $img_name;
        $school->mobile = $request->mobile;
        $school->user_status = $request->status;
        $school->save();
        if ($school) {
            // if ($request->input('boards') != '') {
            //     $count = count($request->input('boards'));
            //     for ($i = 0; $i < $count; $i++) {
            //         $schoolboard = new SchoolBoard();
            //         $schoolboard->school_id = $school->id;
            //         $schoolboard->board_id = $request->boards[$i];
            //         $schoolboard->save();
            //     }
            // }
            return redirect()->route('school.list')->with('flash-success', 'School added successfully');
        } else {
            return back()->with('flash-error', 'Error occured in adding data');
        }
    }


    public function edit($id = '')
    {
        // $single_info = School::find($id)->with('schoolboards')->firstOrFail();
        $single_info = School::findOrFail($id);
        // $boards_info = Board::all();
        return view('admin.school.edit', compact('single_info'));
        // return view('admin.school.edit', compact('single_info', 'boards_info'));
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

        $school_edit = School::findOrFail($id);
        if ($request->file('icon') != '') {
            $img_name = time() . '-' . Str::of(md5(time() . $request->file('icon')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('icon')->extension();
            $request->file('icon')->storeAs('admin-assets/img/school/', $img_name);
            if ($school_edit->avatar != '') {
                unlink(public_path('admin-assets/img/school/' . $school_edit->avatar));
            }
            $school_edit->avatar = $img_name;
        }
        $school_edit->fullname = $request->name;
        $school_edit->username = $request->username;
        $school_edit->email = $request->email;
        $school_edit->reg_no = $request->reg_no;
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
            return redirect()->route('school.list')->with('flash-success', 'School updated successfully');
        } else {
            return back()->with('flash-error', 'Error occured in updating data');
        }
    }

    public function status($id = '', $status = '')
    {
        $result = School::findOrFail($id);
        $result->user_status = $status;
        $result->save();
        if ($result) {
            return back()->with('flash-success', 'School status updated successfully.');
        } else {
            return back()->with('flash-error', 'Error occured in updating status.');
        }
    }
}
