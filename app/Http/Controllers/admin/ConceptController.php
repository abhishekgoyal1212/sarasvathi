<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Concept;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Traits\Common_trait;

class ConceptController extends Controller
{
    use Common_trait;

    public function index($chapter_id = '', $subject_id = '')
    {
        $concept_info = Concept::where('chapter_id', $chapter_id)->with('chapter')->with('subject')->get();
        return view('admin.concept.index', compact('concept_info', 'chapter_id', 'subject_id'));
    }
    public function insert(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'content' => 'required',
            'concept_type' => 'required',
            'status' => 'required',
        ]);

        $concept = new Concept();

        if ($request->file('file') != '') {
            $concept->file = time() . '-' . Str::of(md5(time() . $request->file('file')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('file')->extension();
            $request->file('file')->storeAs('admin-assets/img/concept/', $concept->file);
        }

        $concept->heading = upperfirst($request->heading);
        $concept->content = upperfirst($request->content);
        $concept->concept_type = $request->concept_type;
        $concept->chapter_id = $request->chapter_id;
        $concept->subject_id = $request->subject_id;
        $concept->status = $request->status;
        $concept->slug = $this->create_unique_slug($request->name, CONCEPT, 'slug');
        $concept->save();

        if ($concept) {
            return back()->with('flash-success', 'Concept added successfully');
        } else {
            return back()->with('flash-error', 'Error occured in adding data');
        }
    }

    public function edit($id = '')
    {
        $concept_edit = Concept::findOrFail($id);
        $concept_info = Concept::where('chapter_id', $concept_edit->chapter_id)->with('chapter')->with('subject')->get();
        $subject_id = $concept_edit->subject_id;
        $chapter_id = $concept_edit->chapter_id;
        return view('admin.concept.index', compact('concept_info', 'chapter_id', 'subject_id', 'concept_edit'));
    }


    public function update(Request $request, $id = '')
    {
        $request->validate([
            'heading' => 'required',
            'content' => 'required',
            'concept_type' => 'required',
        ]);
        $concept_edit = Concept::findOrFail($id);
        if ($request->file('file') != '') {
            $img_name = time() . '-' . Str::of(md5(time() . $request->file('file')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('file')->extension();
            $request->file('file')->storeAs('admin-assets/img/concept/', $img_name);
            if ($concept_edit->file != '') {
                unlink(public_path('admin-assets/img/concept/' . $concept_edit->file));
            }
            $concept_edit->file = $img_name;
        }
        $concept_edit->heading = upperfirst($request->heading);
        $concept_edit->content = upperfirst($request->content);
        $concept_edit->concept_type = $request->concept_type;
        $concept_edit->chapter_id = $request->chapter_id;
        $concept_edit->subject_id = $request->subject_id;
        $concept_edit->slug = $this->create_unique_slug($request->name, CONCEPT, 'slug');
        $concept_edit->save();

        if ($concept_edit) {
            return back()->with('flash-success', 'Concept updated successfully');
        } else {
            return back()->with('flash-error', 'Error occured in updating data');
        }
    }

    public function delete($id = '')
    {

        $result = Concept::findOrFail($id);
        $result->status = 0;
        $result->delete_status = 1;
        $result->save();

        if ($result) {
            return back()->with('flash-success', 'Course deleted successfully');
        } else {
            return back()->with('flash-error', 'Error occured in updating status');
        }
    }

    public function status($id = '', $status = '')
    {

        $result = Concept::findOrFail($id);
        $result->status = $status;
        $result->save();
        if ($result) {
            return back()->with('flash-success', 'Concept status updated successfully');
        } else {
            return back()->with('flash-error', 'Error occured in updating status');
        }
    }
}
