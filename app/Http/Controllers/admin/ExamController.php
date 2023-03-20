<?php


namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Traits\Common_trait;

class ExamController extends Controller
{
    use Common_trait;

    public function index()
    {
        $all_info = Exam::all();
        return view('admin.exam.index', compact('all_info'));
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description'=>'required',
            'icon' => 'required|image|mimes:jpg,jpeg,png',
            'status' => 'required',
        ]);
        if ($request->file('icon') != '') {
            $img_name = time() . '-' . Str::of(md5(time() . $request->file('icon')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('icon')->extension();
            $request->file('icon')->storeAs('admin-assets/img/exam/', $img_name);
        }
        $exam = new Exam();
        $exam->name = $request->name;
        $exam->slug = $this->create_unique_slug($request->input('name'), BOARD, 'slug');
        $exam->icon = $img_name;
        $exam->description = $request->description;
        $exam->status = $request->status;
        $exam->save();
        if ($exam) {
            return back()->with('flash-success', 'Exam added successfully');
        } else {
            return back()->with('flash-error', 'Error occured in adding data');
        }
    }


    public function edit($id = '')
    {
        $single_info = Exam::findOrFail($id);
        return view('admin.exam.edit', compact('single_info'));
    }



    public function update(Request $request, $id = '')
    {
        $request->validate([
            'name' => 'required',
            'description'=>'required',
            'icon' => 'image|mimes:jpg,jpeg,png',
        ]);

        $exam_info = Exam::findOrFail($id);
       
        if ($request->file('icon') != '') {
            $img_name = time() . '-' . Str::of(md5(time() . $request->file('icon')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('icon')->extension();
            $request->file('icon')->storeAs('admin-assets/img/exam/', $img_name);
            if ($exam_info->icon != '') {
                unlink(public_path('admin-assets/img/exam/' . $exam_info->icon));
            }
            $exam_info->icon = $img_name;
        }

        $exam_info->name = $request->name;
        $exam_info->slug = $this->create_unique_slug($request->input('name'), BOARD, 'slug');
        $exam_info->description = $request->description; 
        $exam_info->save();

        if ($exam_info) {
            return back()->with('flash-success', 'Exam updated successfully');
        } else {
            return back()->with('flash-error', 'Error occured in updating data');
        }
    }

    public function status($id = '', $status = '')
    {
        $data = [
            'status' => $status,
        ];
        $result = Exam::findOrFail($id)->update($data);
        if ($result) {
            return back()->with('flash-success', 'Exam status updated successfully.');
        } else {
            return back()->with('flash-error', 'Error occured in updating status.');
        }
    }
}

