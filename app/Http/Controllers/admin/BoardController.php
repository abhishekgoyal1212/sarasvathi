<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Traits\Common_trait;

class BoardController extends Controller
{
    use Common_trait;

    public function index()
    {
        $all_info = Board::all();
        return view('admin.board.index', compact('all_info'));
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'icon' => 'required|image|mimes:jpg,jpeg,png',
            'status' => 'required',
        ]);
        if ($request->file('icon') != '') {
            $img_name = time() . '-' . Str::of(md5(time() . $request->file('icon')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('icon')->extension();
            $request->file('icon')->storeAs('admin-assets/img/board/', $img_name);
        }
        $board = new Board();
        $board->name = $request->name;
        $board->slug = $this->create_unique_slug($request->input('name'), BOARD, 'slug');
        $board->icon = $img_name;
        $board->description = $request->description;
        $board->status = $request->status;
        $board->save();
        if ($board) {
            return redirect()->route('board.list')->with('flash-success', 'Board added successfully');
        } else {
            return back()->with('flash-error', 'Error occured in adding data');
        }
    }


    public function edit($id = '')
    {
        $single_info = Board::findOrFail($id);
        return view('admin.board.edit', compact('single_info'));
    }



    public function update(Request $request, $id = '')
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'icon' => 'image|mimes:jpg,jpeg,png',
        ]);

        $board_info = Board::findOrFail($id);

        if ($request->file('icon') != '') {
            $img_name = time() . '-' . Str::of(md5(time() . $request->file('icon')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('icon')->extension();
            $request->file('icon')->storeAs('admin-assets/img/board/', $img_name);
            if ($board_info->icon != '') {
                unlink(public_path('admin-assets/img/board/' . $board_info->icon));
            }
            $board_info->icon = $img_name;
        }

        $board_info->name = $request->name;
        $board_info->slug = $this->create_unique_slug($request->input('name'), BOARD, 'slug');
        $board_info->description = $request->description;
        $board_info->save();

        if ($board_info) {
            return redirect()->route('board.list')->with('flash-success', 'Board updated successfully');
        } else {
            return back()->with('flash-error', 'Error occured in updating data');
        }
    }

    public function status($id = '', $status = '')
    {
        $result = Board::findOrFail($id);
        $result->status = $status;
        $result->save();
        if ($result) {
            return back()->with('flash-success', 'Board status updated successfully.');
        } else {
            return back()->with('flash-error', 'Error occured in updating status.');
        }
    }
}
