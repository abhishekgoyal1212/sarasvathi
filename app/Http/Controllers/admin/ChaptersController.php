<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Chapters;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Traits\Common_trait;
use Illuminate\Support\Facades\Auth;

class ChaptersController extends Controller
{
    use Common_trait;

    public function index($subject_id = '')
    {
        $subject_info = Subject::with('chapters')->findOrFail($subject_id);
        return view('admin.chapter.index', compact('subject_info'));
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        

        $chapter = new Chapters();
        $chapter->name = upperfirst($request->name);
        $chapter->description = upperfirst($request->description);
        $chapter->subject_id = $request->subject_id;
        $chapter->class_id = $request->class_id;
        $chapter->exam_id = $request->exam_id;
        $chapter->board_id = $request->board_id;
        $chapter->uploader_type = Auth::user()->uploader_type;
        $chapter->uploader_id = Auth::user()->id;
        $chapter->status = $request->status;
        $chapter->slug = $this->create_unique_slug($request->name, CHAPTER, 'slug');

        $chapter->save();

        if ($chapter) {
            return back()->with('flash-success', 'Chapter added successfully');
        } else {
            return back()->with('flash-error', 'Error occured in adding data');
        }
    }

    public function edit($id = '')
    {
        $chapter_info = Chapters::findOrFail($id);
        $subject_info = Subject::with('chapters')->findOrFail($chapter_info->subject_id);
        return view('admin.chapter.index', compact('subject_info', 'chapter_info'));
    }


    public function update(Request $request, $id = '', $subject_id = '')
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $chapter_edit = Chapters::findOrFail($id);
        $chapter_edit->name = upperfirst($request->name);
        $chapter_edit->description = upperfirst($request->description);
        $chapter_edit->subject_id = $request->subject_id;
        $chapter_edit->class_id = $request->class_id;
        $chapter_edit->exam_id = $request->exam_id;
        $chapter_edit->board_id = $request->board_id;
        $chapter_edit->slug = $this->create_unique_slug($request->name, CHAPTER, 'slug');
        $chapter_edit->save();

        if ($chapter_edit) {
            return back()->with('flash-success', 'Course updated successfully');
        } else {
            return back()->with('flash-error', 'Error occured in updating data');
        }
    }

    public function delete($id = '')
    {
        $data = [
            'delete_status' => 1,
            'status' => 0,
        ];
        $result = Chapters::findOrFail($id)->update($data);

        if ($result) {
            return back()->with('flash-success', 'Course deleted successfully');
        } else {
            return back()->with('flash-error', 'Error occured in updating status');
        }
    }

    public function status($id = '', $status = '')
    {
        $result = Chapters::findOrFail($id);
        $result->status = $status;
        $result->save();
        if ($result) {
            return back()->with('flash-success', 'Course status updated successfully');
        } else {
            return back()->with('flash-error', 'Error occured in updating status');
        }
    }
}
