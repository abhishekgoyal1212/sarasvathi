<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Dynamic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Traits\Common_trait;

class DynamicController extends Controller
{
    use Common_trait;


    public function edit_logo()
    {
        $single_info = Dynamic::where('type', 'logo')->firstOrFail();
        return view('admin.dynamic.logo-edit', compact('single_info'));
    }



    public function update_logo(Request $request)
    {
        // pre($request->all());
        $request->validate([
            'name' => 'required',
            'icon' => 'image|mimes:jpg,jpeg,png',
        ]);

        $logo = Dynamic::where('type', 'logo')->firstOrFail();
        $logo_edit = $logo;
        $logo_edit->heading = $request->name;
        if ($request->file('icon') != '') {
            $img_name = time() . '-' . Str::of(md5(time() . $request->file('icon')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('icon')->extension();
            $request->file('icon')->storeAs('admin-assets/img/dynamic/', $img_name);
            if ($logo->image != '') {
                unlink(public_path('/admin-assets/img/dynamic/' . $logo->image));
            }
            $logo_edit->image = $img_name;
        }

        $logo_edit->save();

        if ($logo_edit) {
            return back()->with('flash-success', 'Logo updated successfully');
        } else {
            return back()->with('flash-error', 'Error occured in updating data');
        }
    }
    public function edit_banner()
    {
        $single_info = Dynamic::where('type', 'banner')->firstOrFail();
        return view('admin.dynamic.banner-edit', compact('single_info'));
    }

    public function update_banner(Request $request)
    {
        $request->validate([
            'icon' => 'image|mimes:jpg,jpeg,png',
        ]);
        $banner = Dynamic::where('type', 'banner')->firstOrFail();
        $banner_edit = $banner;
        if ($request->file('icon') != '') {
            $img_name = time() . '-' . Str::of(md5(time() . $request->file('icon')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('icon')->extension();
            $request->file('icon')->storeAs('admin-assets/img/dynamic/', $img_name);
            if ($banner->image != '') {
                unlink(public_path('/admin-assets/img/dynamic/' . $banner->image));
            }
            $banner_edit->image = $img_name;
        }
        $banner_edit->save();

        if ($banner_edit) {
            return back()->with('flash-success', 'Banner updated successfully');
        } else {
            return back()->with('flash-error', 'Error occured in updating data');
        }
    }
    public function edit_loginpage()
    {
        $single_info = Dynamic::where('type', 'loginpage')->firstOrFail();
        return view('admin.dynamic.loginpage-edit', compact('single_info'));
    }

    public function update_loginpage(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'content' => 'required',
            'icon' => 'image|mimes:jpg,jpeg,png',
        ]);

        $loginpage_edit = Dynamic::where('type', 'loginpage')->firstOrFail();
        $loginpage_edit->heading = $request->heading;
        $loginpage_edit->content = $request->content;

        if ($request->file('icon') != '') {
            $img_name = time() . '-' . Str::of(md5(time() . $request->file('icon')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('icon')->extension();
            $request->file('icon')->storeAs('admin-assets/img/dynamic/', $img_name);
            if ($loginpage_edit->image != '') {
                unlink(public_path('/admin-assets/img/dynamic/' . $loginpage_edit->image));
            }
            $loginpage_edit->image = $img_name;
        }
        $loginpage_edit->save();

        if ($loginpage_edit) {
            return back()->with('flash-success', 'Data updated successfully');
        } else {
            return back()->with('flash-error', 'Error occured in updating data');
        }
    }
}
