<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Traits\Common_trait;

class LessonController extends Controller
{
    use Common_trait;
    public function insert(Request $request)
    {
        if ($request->file('thumbnail') != '') {
            $thumbnail = time() . '-' . Str::of(md5(time() . $request->file('thumbnail')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('thumbnail')->extension();
            $request->file('thumbnail')->storeAs('admin-assets/img/lesson/thumbnail/', $thumbnail);
        }

        if ($request->file('vid_name') != '') {
            $vid_name = time() . '-' . Str::of(md5(time() . $request->file('vid_name')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('vid_name')->extension();
            $request->file('vid_name')->storeAs('admin-assets/video/lesson/', $vid_name);
        } else {
            $vid_name = '';
        }

        // if ($request->file('file_name') != '') {
        //     $file_name = time() . '-' . Str::of(md5(time() . $request->file('file_name')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('file_name')->extension();
        //     $request->file('file_name')->storeAs('admin-assets/img/lesson/', $file_name);
        // } else {
        //     $file_name = '';
        // }

        $lesson = new Lesson();
        $lesson->name = upperfirst($request->name);
        $lesson->description = upperfirst($request->description);
        $lesson->subject_id = $request->subject_id;
        $lesson->chapter_id = $request->chapter_id;
        $lesson->section_id = $request->section_id;
        // $lesson->lesson_type  = $request->lesson_type;
        $lesson->vid_duration  = $request->vid_duration;
        // $lesson->file_name  = $file_name;
        $lesson->thumbnail  = $thumbnail;
        $lesson->vid_name  = $vid_name;
        $lesson->status = $request->status;
        $lesson->slug = $this->create_unique_slug($request->name, LESSONS, 'slug');
        $lesson->save();

        if ($lesson) {
            return back()->with('flash-success', 'Lesson added successfully');
        } else {
            return back()->with('flash-error', 'Error occured in adding data');
        }
    }

    public function edit($id = '')
    {
        $lesson_edit = Lesson::with('chapter')->with('section')->findOrFail($id);
        $sections_info = Section::where('chapter_id', $lesson_edit->chapter_id)->with('chapter')->get();
        $lessons_info = Lesson::where('chapter_id', $lesson_edit->chapter_id)->with('chapter')->with('section')->get();
        $subject_id = $lesson_edit->subject_id;
        $chapter_id = $lesson_edit->chapter_id;
        $type = 'lesson';
        return view('admin.section.index', compact('sections_info', 'type', 'lessons_info', 'lesson_edit', 'chapter_id', 'subject_id'));
    }

    public function update(Request $request, $id = '')
    {

        $lesson_edit = Lesson::findOrFail($id);
        if ($request->file('thumbnail') != '') {
            $img_name = time() . '-' . Str::of(md5(time() . $request->file('thumbnail')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('thumbnail')->extension();
            $request->file('thumbnail')->storeAs('admin-assets/img/lesson/thumbnail/', $img_name);
            if ($lesson_edit->thumbnail != '') {
                unlink(public_path('admin-assets/img/lesson/thumbnail/' . $lesson_edit->thumbnail));
            }
            $lesson_edit->thumbnail = $img_name;
        }

        if ($request->file('vid_name') != '') {
            $vid_name = time() . '-' . Str::of(md5(time() . $request->file('vid_name')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('vid_name')->extension();
            $request->file('vid_name')->storeAs('admin-assets/video/lesson/', $vid_name);
            if ($lesson_edit->vid_name != '') {
                unlink(public_path('admin-assets/video/lesson/' . $lesson_edit->vid_name));
            }
            // if ($lesson_edit->file_name != '') {
            //     unlink(public_path('admin-assets/img/lesson/' . $lesson_edit->file_name));
            //     $lesson_edit->file_name = '';
            // }
            $lesson_edit->vid_name = $vid_name;
        }

        // if ($request->file('file_name') != '') {
        //     $file_name = time() . '-' . Str::of(md5(time() . $request->file('file_name')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('file_name')->extension();
        //     $request->file('file_name')->storeAs('admin-assets/img/lesson/', $file_name);
        //     if ($lesson_edit->file_name != '') {
        //         unlink(public_path('admin-assets/img/lesson/' . $lesson_edit->file_name));
        //     }
        //     if ($lesson_edit->vid_name != '') {
        //         unlink(public_path('admin-assets/video/lesson/' . $lesson_edit->vid_name));
        //         $lesson_edit->vid_name = '';
        //     }
        //     $lesson_edit->file_name = $file_name;
        // }


        $lesson_edit->name = upperfirst($request->name);
        $lesson_edit->description = upperfirst($request->description);
        $lesson_edit->subject_id = $request->subject_id;
        $lesson_edit->chapter_id = $request->chapter_id;
        $lesson_edit->section_id = $request->section_id;
        // $lesson_edit->lesson_type  = $request->lesson_type;
        $lesson_edit->vid_duration  = $request->vid_duration;
        $lesson_edit->slug = $this->create_unique_slug($request->name, LESSONS, 'slug');
        $lesson_edit->save();

        if ($lesson_edit) {
            return back()->with('flash-success', 'Lesson updated successfully');
        } else {
            return back()->with('flash-error', 'Error occured in updating data');
        }
    }


    public function status($id = '', $status = '')
    {
        $result = Lesson::findOrFail($id);
        $result->status = $status;
        $result->save();
        if ($result) {
            return back()->with('flash-success', 'Lesson status updated successfully');
        } else {
            return back()->with('flash-error', 'Error occured in updating status');
        }
    }
}
