<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CourseTags;
use App\Models\Tags;
use Illuminate\Http\Request;
use App\Traits\Common_trait;

class TagsController extends Controller
{
    use Common_trait;
    public function index()
    {
        $all_info = Tags::all();
        return view('admin.tags.index', compact('all_info'));
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $tags = new Tags();
        $tags->name = upperfirst($request->name);
        $tags->slug = $this->create_unique_slug($request->input('name'), TAGS, 'slug');
        $tags->status = $request->status;
        $tags->save();

        if ($tags) {
            return back()->with('flash-success', 'Tag added successfully');
        } else {
            return back()->with('flash-error', 'Error occured in adding data');
        }
    }



    public function edit($slug = '')
    {
        $single_info = Tags::where('slug', $slug)->firstOrFail();
        $all_info = Tags::all();

        return view('admin.tags.index', compact('single_info', 'all_info', 'slug'));
    }



    public function update(Request $request, $slug = '')
    {
        $request->validate([
            'name' => 'required',
        ]);

        $tags = Tags::where('slug', $slug)->first();
        $tags->name = upperfirst($request->name);
        $tags->slug = $this->create_unique_slug($request->input('name'), TAGS, 'slug');
        $tags->save();

        if ($tags) {
            return redirect()->route('tags.list')->with('flash-success', 'Tags updated successfully');
        } else {
            return back()->with('flash-error', 'Error occured in updating data');
        }
    }

    public function status($id = '', $status = '')
    {
        $data = [
            'status' => $status,
        ];
        $result = Tags::findOrFail($id)->update($data);
        if ($result) {
            return back()->with('flash-success', 'Tag status updated successfully');
        } else {
            return back()->with('flash-error', 'Error occured in deleting data');
        }
    }

    public function delete($id = '')
    {
        $result = Tags::findOrFail($id)->delete();
        if ($result) {
            CourseTags::where('tag_id', $id)->delete();
            return back()->with('flash-success', 'Tag deleted successfully');
        } else {
            return back()->with('flash-error', 'Error occured in deleting data');
        }
    }
}
