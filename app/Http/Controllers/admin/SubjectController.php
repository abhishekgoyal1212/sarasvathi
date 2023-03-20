<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Subject;
use App\Models\Board;
use App\Models\Exam;
use App\Models\Lesson;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Traits\Common_trait;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    use Common_trait;

    public function index()
    {
        $all_info = Subject::with('classes')->with('board')->where(['uploader_type' => Auth::user()->uploader_type, 'uploader_id' => Auth::user()->id])->get();
        return view('admin.subject.index', compact('all_info'));
    }

    public function add()
    {
        $classes_info = Classes::active()->get();
        $boards_info = Board::active()->get();
        $exams_info = Exam::active()->get();
        return view('admin.subject.add', compact('classes_info', 'boards_info', 'exams_info'));
    }

    public function insert(Request $request)
    {
        // pre($request->all());
        if ($request->aboveTen == 1) {
            $required_stream = 'required';
        } else {
            $required_stream = '';
        }
        // pre($required_stream);
        $request->validate(
            [
                'name' => 'required',
                'icon' => 'required|image|mimes:jpg,jpeg,png',
                'description' => 'required',
                'class_id' => 'required',
                // 'exam_id' => 'required',
                'board_id' => 'required',
                'hexcolor_1' => 'required',
                'hexcolor_2' => 'required',
                'stream_select' => $required_stream,
                'status' => 'required'
            ],
            [
                'board_id.required' => 'Select at least one board.',
                'class_id.required' => 'Select at least one class.',
                'stream_select.required' => 'Select at least one stream.'
            ],
        );

        if ($request->file('icon') != '') {
            $img_name = time() . '-' . Str::of(md5(time() . $request->file('icon')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('icon')->extension();
            $request->file('icon')->storeAs('admin-assets/img/subject/', $img_name);
        }
    
        $subject = new Subject();
        $subject->name = $request->name;
        $subject->slug = $this->create_unique_slug($request->input('name'), SUBJECT, 'slug');
        $subject->description = $request->description;
        $subject->class_id = $request->class_id;
        $subject->hexcolor_1 = $request->hexcolor_1;
        $subject->hexcolor_2 = $request->hexcolor_2;
        $subject->icon = $img_name;
        $subject->exam_id = $request->exam_id;
        $subject->board_id = $request->board_id;
        $subject->stream_select = $request->stream_select??0;
        $subject->uploader_type = Auth::user()->uploader_type;
        if(Auth::user()->user_type == 'instructor')
        {
            $subject->uploader_id = Auth::user()->school_id;
        }else{
            $subject->uploader_id = Auth::user()->id;
        }
        $subject->status = $request->status;
        $subject->save();

        if ($subject) {
            return redirect()->route('subjects.list')->with('flash-success', 'Subject added successfully');
        } else {
            return back()->with('flash-error', 'Error occured in adding data');
        }
    }

    public function edit($id = '')
    {
        $subject_info = Subject::with('chapters')->findOrFail($id);
        $sections_info = Section::where('subject_id', $id)->with('chapter')->get();
        $lessons_info = Lesson::where('subject_id', $id)->with('chapter')->with('section')->get();
        $classes_info = Classes::active()->get();
        $boards_info = Board::active()->get();
        $exams_info = Exam::active()->get();
        $type = 'subject';
        return view('admin.subject.edit', compact('classes_info', 'sections_info', 'boards_info', 'exams_info', 'subject_info', 'type', 'lessons_info'));
    }

    public function update(Request $request, $id = '')
    {
        if ($request->aboveTen == 1) {
            $required_stream = 'required';
        } else {
            $required_stream = '';
        }
        $request->validate(
            [
                'name' => 'required',
                'icon' => 'image|mimes:jpg,jpeg,png',
                'description' => 'required',
                'class_id' => 'required',
                // 'exam_id' => 'required',
                'board_id' => 'required',
                'hexcolor_1' => 'required',
                'hexcolor_2' => 'required',
                'stream_select' => $required_stream,
            ],
            [
                'board_id.required' => 'Select at least one board.',
                'class_id.required' => 'Select at least one class.',
                'stream_select.required' => 'Select at least one stream.'
            ],
        );

        $subject_edit = Subject::findOrFail($id);
        if ($request->file('icon') != '') {
            $img_name = time() . '-' . Str::of(md5(time() . $request->file('icon')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('icon')->extension();
            $request->file('icon')->storeAs('admin-assets/img/subject/', $img_name);
            if ($subject_edit->icon != '') {
                unlink(public_path('admin-assets/img/subject/' . $subject_edit->icon));
            }
            $subject_edit->icon = $img_name;
        }
        $subject_edit->name = $request->name;
        $subject_edit->slug = $this->create_unique_slug($request->input('name'), SUBJECT, 'slug');
        $subject_edit->description = $request->description;
        $subject_edit->class_id = $request->class_id;
        $subject_edit->hexcolor_1 = $request->hexcolor_1;
        $subject_edit->hexcolor_2 = $request->hexcolor_2;
        $subject_edit->exam_id = $request->exam_id;
        $subject_edit->board_id = $request->board_id;
        $subject_edit->stream_select = $request->stream_select??0;
        $subject_edit->save();

        if ($subject_edit) {
            return back()->with('flash-success', 'Subject updated successfully');
        } else {
            return back()->with('flash-error', 'Error occured in adding data');
        }
    }

    public function status($id = '', $status = '')
    {
        $result = Subject::findOrFail($id);
        $result->status = $status;
        $result->save();
        if ($result) {
            return back()->with('flash-success', 'Suject status updated successfully');
        } else {
            return back()->with('flash-error', 'Error occured in updating status');
        }
    }
}
