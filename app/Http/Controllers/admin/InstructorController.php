<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Board;
use App\Models\Instructor;
use Illuminate\Http\Request;
use App\Traits\Common_trait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str; 

class InstructorController extends Controller
{
    use Common_trait;

    public function index()
    {
        $all_info = Instructor::all();
        return view('admin.teacher.index', compact('all_info'));
    }

    public function add()
    {
        return view('admin.teacher.add');
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:.' . INSTRUCT,
            'password' => 'required',
            'username' => 'required|unique:.' . INSTRUCT,
            'icon' => 'required|image|mimes:jpg,jpeg,png',
            'status' => 'required',
        ]);

        if ($request->file('icon') != '') {
            $img_name = time() . '-' . Str::of(md5(time() . $request->file('icon')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('icon')->extension();
            $request->file('icon')->storeAs('admin-assets/img/teacher/', $img_name);
        }
        $teacher = new Instructor();
        $teacher->fullname = $request->name;
        $teacher->school_id = auth()->user()->id;
        $teacher->username = $request->username;
        $teacher->email = $request->email;
        $teacher->dob = $request->dob;
        $teacher->password = Hash::make($request->password);
        $teacher->avatar = $img_name;
        $teacher->mobile = $request->mobile;
        $teacher->user_status = $request->status;
        $teacher->save();
        if ($teacher) {
            return redirect()->route('teacher.list')->with('flash-success', 'Teacher added successfully');
        } else {
            return back()->with('flash-error', 'Error occured in adding data');
        }
    }


    public function edit($id = '')
    {
        $single_info = Instructor::findOrFail($id);
        return view('admin.teacher.edit', compact('single_info'));
    }



    public function update(Request $request, $id = '')
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:.' . INSTRUCT . ',email,' . $id,
            'username' => 'required|unique:.' . INSTRUCT . ',username,' . $id,
            'icon' => 'image|mimes:jpg,jpeg,png',
        ]);

        $teacher_edit = Instructor::findOrFail($id);
        if ($request->file('icon') != '') {
            $img_name = time() . '-' . Str::of(md5(time() . $request->file('icon')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('icon')->extension();
            $request->file('icon')->storeAs('admin-assets/img/teacher/', $img_name);
            if ($teacher_edit->avatar != '') {
                unlink(public_path('admin-assets/img/teacher/' . $teacher_edit->avatar));
            }
            $teacher_edit->avatar = $img_name;
        }
        $teacher_edit->fullname = $request->name;
        $teacher_edit->username = $request->username;
        $teacher_edit->email = $request->email;
        $teacher_edit->dob = $request->dob;

        if ($request->password != '') {
            $teacher_edit->password = Hash::make($request->password);
        }
        $teacher_edit->mobile = $request->mobile;
        $teacher_edit->save();

        if ($teacher_edit) {
            return redirect()->route('teacher.list')->with('flash-success', 'Teacher updated successfully');
        } else {
            return back()->with('flash-error', 'Error occured in updating data');
        }
    }

    public function status($id = '', $status = '')
    {
        $result = Instructor::findOrFail($id);
        $result->user_status = $status;
        $result->save();
        if ($result) {
            return back()->with('flash-success', 'Teacher status updated successfully.');
        } else {
            return back()->with('flash-error', 'Error occured in updating status.');
        }
    }
}
