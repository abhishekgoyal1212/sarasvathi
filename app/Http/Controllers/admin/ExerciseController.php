<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Traits\Common_trait;

class ExerciseController extends Controller
{
    use Common_trait;
    public function index_icon()
    {
        $all_info = Exercise::all();
        return view('admin.exercise.index_icon', compact('all_info'));
    }

    public function insert_icon(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);
        $exercise = new Exercise();

        if ($request->file('icon') != '') {
            $exercise->icon = time() . '-' . Str::of(md5(time() . $request->file('icon')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('icon')->extension();
            $request->file('icon')->storeAs('admin-assets/img/exercise/', $exercise->icon);
        }
        $exercise->name = $request->name;
        $exercise->description = $request->description;
        $exercise->type = $request->type;
        $exercise->slug = $this->create_unique_slug($request->input('name'), EXERCISE, 'slug');
        $exercise->status = $request->status;
        $exercise->save();

        if ($exercise) {
            return back()->with('flash-success', 'Quick added successfully');
        } else {
            return back()->with('flash-error', 'Error occured in adding data');
        }
    }



    public function edit_icon($id = '')
    {
        $single_info = Exercise::findOrFail($id);
        $all_info = Exercise::all();

        return view('admin.exercise.index_icon', compact('single_info', 'all_info'));
    }



    public function update_icon(Request $request, $id = '')
    {
        $request->validate([
            'name' => 'required',
        ]);

        $exercise = Exercise::findOrFail($id);
        if ($request->file('icon') != '') {
            $exercise->icon = time() . '-' . Str::of(md5(time() . $request->file('icon')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('icon')->extension();
            $request->file('icon')->storeAs('admin-assets/img/exercise/', $exercise->icon);
        }
        $exercise->name = $request->name;
        $exercise->description = $request->description;
        $exercise->type = $request->type;
        $exercise->slug = $this->create_unique_slug($request->input('name'), EXERCISE, 'slug');
        $exercise->save();

        if ($exercise) {
            return back()->with('flash-success', 'Exercise updated successfully');
        } else {
            return back()->with('flash-error', 'Error occured in updating data');
        }
    }

    public function status_icon($id = '', $status = '')
    {
        $result = Exercise::findOrFail($id);
        $result->status = $status;
        $result->save();
        if ($result) {
            return back()->with('flash-success', 'Quick status updated successfully');
        } else {
            return back()->with('flash-error', 'Error occured in deleting data');
        }
    }

    public function delete_icon($id = '')
    {
        $result = Exercise::findOrFail($id)->delete();
        if ($result) {
            Exercise::where('tag_id', $id)->delete();
            return back()->with('flash-success', 'Quick deleted successfully');
        } else {
            return back()->with('flash-error', 'Error occured in deleting data');
        }
    }
}
