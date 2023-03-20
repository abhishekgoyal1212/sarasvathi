<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Board;
use App\Models\Classes;
use App\Models\CountryCode;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\Common_trait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    use Common_trait;

    public function index()
    {

        $all_info = User::where('school_id', Auth::user()->id)->get();
        return view('admin.student.index', compact('all_info'));
    }

    public function add()
    {
        $boards_info = Board::all();
        $classes_info = Classes::all();
        $codes_info = CountryCode::all();
        return view('admin.student.add', compact('boards_info', 'classes_info', 'codes_info'));
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:.' . USERS,
            'mobile' => 'required|min:6|max:15|unique:.' . USERS,
            'password' => 'required',
            'username' => 'required|unique:.' . USERS,
            'icon' => 'image|mimes:jpg,jpeg,png',
            'board' => 'required',
            'class' => 'required',
            'country_code' => 'required',
            'status' => 'required',
        ]);

        if ($request->file('icon') != '') {
            $img_name = time() . '-' . Str::of(md5(time() . $request->file('icon')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('icon')->extension();
            $request->file('icon')->storeAs('admin-assets/img/student/', $img_name);
        }else{
            $img_name='';
        }
        $student = new User();
        $student->fullname = $request->name;
        $student->username = $request->username;
        $student->email = $request->email;
        $student->password = Hash::make($request->password);
        $student->avatar = $img_name;
        $student->country_code = $request->country_code;
        $student->mobile = $request->mobile;
        $student->board_id = $request->board;
        $student->class_id = $request->class;
        if(Auth::user()->user_type == 'instructor')
        {
            $student->school_id = Auth::user()->school_id;
        }else{
            $student->school_id = Auth::user()->id;
        }
        $student->user_status = $request->status;
        $student->dob = $request->dob;
        $student->role_status = 2;
        $student->save();

        if ($student) {
            return redirect()->route('student.list')->with('flash-success', 'Student added successfully');
        } else {
            return back()->with('flash-error', 'Error occured in adding data');
        }
    }


    public function edit($id = '')
    {
        $single_info = User::findOrFail($id);
        $boards_info = Board::all();
        $classes_info = Classes::all();
        $codes_info = CountryCode::all();
        return view('admin.student.edit', compact('single_info', 'boards_info', 'classes_info', 'codes_info'));
    } 


    public function update(Request $request, $id = '')
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:.' . USERS . ',email,' . $id,
            'mobile' => 'required|min:6|max:15|unique:.' . USERS . ',username,' . $id,
            'username' => 'required|unique:.' . USERS . ',username,' . $id,
            'icon' => 'image|mimes:jpg,jpeg,png',
            'board' => 'required',
            'class' => 'required',
            'country_code' => 'required',
            'status' => 'required',
        ]);

        $student_edit = User::findOrFail($id);
        if ($request->file('icon') != '') {
            $img_name = time() . '-' . Str::of(md5(time() . $request->file('icon')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('icon')->extension();
            $request->file('icon')->storeAs('admin-assets/img/student/', $img_name);
            if ($student_edit->avatar != '') {
                unlink(public_path('admin-assets/img/student/' . $student_edit->avatar));
            }
            $student_edit->avatar = $img_name;
        }
        $student_edit->fullname = $request->name;
        $student_edit->username = $request->username;
        $student_edit->email = $request->email;
        if ($request->password != '') {
            $student_edit->password = Hash::make($request->password);
        }
        $student_edit->country_code = $request->country_code;
        $student_edit->mobile = $request->mobile;
        $student_edit->board_id = $request->board;
        $student_edit->class_id = $request->class;
        $student_edit->dob = $request->dob;
        $student_edit->role_status = 2;
        $student_edit->save();

        if ($student_edit) {

            return redirect()->route('student.list')->with('flash-success', 'Student updated successfully');
        } else {
            return back()->with('flash-error', 'Error occured in updating data');
        }
    }

    public function status($id = '', $status = '')
    {
        $result = User::findOrFail($id);
        $result->user_status = $status;
        $result->save();
        if ($result) {
            return back()->with('flash-success', 'Student status updated successfully.');
        } else {
            return back()->with('flash-error', 'Error occured in updating status.');
        }
    }
    public function freelancer_student()
    {
        $all_info = User::where('school_id',0)->get();
        $type='freelancer';
        return view('admin.student.student_data.index', compact('all_info','type'));
    }
    public function school_student()
    {
        $all_info = User::where('school_id','!=',0)->with('school')->get();
        $type='school';

        return view('admin.student.student_data.index', compact('all_info','type'));
    }
    public function details_student($id = '')
    {
        // $all_info = User::where('id',$id)->first();
      
            $all_info = User::with('school')->with('class')->with('board')->findOrFail($id);
        
        return view('admin.student.student_data.details_page',compact('all_info'));
    }
}
