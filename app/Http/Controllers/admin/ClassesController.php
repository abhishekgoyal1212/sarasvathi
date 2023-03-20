<?php


namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use Illuminate\Http\Request;
use App\Traits\Common_trait;

class ClassesController extends Controller
{
    use Common_trait;

    public function index()
    {
        $all_info = Classes::all();
        return view('admin.classes.index', compact('all_info'));
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);
        $classes = new Classes();
        $classes->name = $request->name;
        $classes->slug = $this->create_unique_slug($request->input('name'), CLASSES, 'slug');
        $classes->description = $request->description;
        $classes->status = $request->status;
        $classes->above_10 = $request->above_10;
        // $classes->stream_select = $request->stream_select;

        $classes->save();
        if ($classes) {
            return redirect()->route('classes.list')->with('flash-success', 'Classes added successfully');
        } else {
            return back()->with('flash-error', 'Error occured in adding data');
        }
    }


    public function edit($id = '')
    {
        $single_info = Classes::findOrFail($id);
        return view('admin.classes.edit', compact('single_info'));
    }



    public function update(Request $request, $id = '')
    {
        $request->validate([
            'name' => 'required',
        ]);

        $classes_edit = Classes::findOrFail($id);
        $classes_edit->name = $request->name;
        $classes_edit->slug = $this->create_unique_slug($request->input('name'), CLASSES, 'slug');
        $classes_edit->description = $request->description;
        $classes_edit->above_10 = $request->above_10;
        // $classes_edit->stream_select = $request->stream_select;
        $classes_edit->save();

        if ($classes_edit) {
            return back()->with('flash-success', 'Classes updated successfully');
        } else {
            return back()->with('flash-error', 'Error occured in updating data');
        }
    }

    public function status($id = '', $status = '')
    {
        $result = Classes::findOrFail($id);
        $result->status = $status;
        $result->save();
        if ($result) {
            return back()->with('flash-success', 'Classes status updated successfully.');
        } else {
            return back()->with('flash-error', 'Error occured in updating status.');
        }
    }
}
