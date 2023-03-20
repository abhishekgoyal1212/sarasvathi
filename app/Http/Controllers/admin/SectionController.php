<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Chapters;
use App\Models\Lesson;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Traits\Common_trait;

class SectionController extends Controller
{
    use Common_trait;

    // public function getSections(Request $request)
    // {
    //     $data['section'] = Section::active()->where('chapter_id', $request->id)->get(['id', 'name']);
    //     return response()->json($data);
    // }

    public function index($chapter_id = '', $subject_id = '')
    {
        $sections_info = Section::where('chapter_id', $chapter_id)->with('chapter')->with('subject')->get();
        $lessons_info = Lesson::where('chapter_id', $chapter_id)->with('chapter')->with('section')->get();
        $type = 'section';
        return view('admin.section.index', compact('sections_info', 'type',  'lessons_info', 'chapter_id', 'subject_id'));
    }
    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        $section = new Section();
        $section->name = upperfirst($request->name);
        $section->description = upperfirst($request->description);
        $section->chapter_id = $request->chapter_id;
        $section->subject_id = $request->subject_id;
        $section->status = $request->status;
        $section->slug = $this->create_unique_slug($request->name, SECTIONS, 'slug');
        $section->save();

        if ($section) {
            return back()->with('flash-success', 'Section added successfully');
        } else {
            return back()->with('flash-error', 'Error occured in adding data');
        }
    }

    public function edit($id = '')
    {
        $section_edit = Section::findOrFail($id);
        $sections_info = Section::where('chapter_id', $section_edit->chapter_id)->with('chapter')->with('subject')->get();
        $lessons_info = Lesson::where('chapter_id', $section_edit->chapter_id)->with('chapter')->with('section')->get();
        $subject_id = $section_edit->subject_id;
        $chapter_id = $section_edit->chapter_id;
        $type = 'section';
        return view('admin.section.index', compact('sections_info', 'type',  'lessons_info', 'chapter_id', 'subject_id', 'section_edit'));
    }


    public function update(Request $request, $id = '')
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $section_edit = Section::findOrFail($id);
        $section_edit->name = upperfirst($request->name);
        $section_edit->description = upperfirst($request->description);
        $section_edit->chapter_id = $request->chapter_id;
        $section_edit->subject_id = $request->subject_id;
        $section_edit->slug = $this->create_unique_slug($request->name, SECTIONS, 'slug');
        $section_edit->save();

        if ($section_edit) {
            return back()->with('flash-success', 'Section updated successfully');
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

        $result = Section::findOrFail($id);
        $result->status = $status;
        $result->save();
        if ($result) {
            return back()->with('flash-success', 'Section status updated successfully');
        } else {
            return back()->with('flash-error', 'Error occured in updating status');
        }
    }
}
