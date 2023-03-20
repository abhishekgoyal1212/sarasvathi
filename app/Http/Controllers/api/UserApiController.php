<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Board;
use App\Models\Classes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Storage;
use Image;
use File;

class UserApiController extends Controller
{
    public function loginUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required',
            'country_code' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => 'All field are required']);
        } else {

            $result = User::where(['mobile' => $request->mobile, 'country_code' => $request->country_code])->first();
            if (!empty($result)) {
                if ($result->user_block_status == 1) {
                    return response(['status' => 'error', 'message' => 'User is blocked.']);
                } else {
                    if (Auth::loginUsingId($result->id)) {
                        $user = Auth::user();
                        $user_data = User::where('id', $user->id)->with('class')->first();
                        $token =  $user->createToken('MyApp')->plainTextToken;
                        $user_status =  $user->user_status;
                        if ($user_data->class_id == 0) {
                            $class = '';
                        } else {
                            $class = $user_data->class->name;
                        }
                        if ($user_data->avatar == '') {
                            $imgs_profile = asset('admin-assets/img/avata.jpg');
                        } else {
                            $imgs_profile = asset('admin-assets/img/students/' . $user_data->avatar);
                        }
                        return response()->json(['status' => 'success', 'message' => 'Logged In', 'userid' => $user->id, 'token' => $token, 'user_status' => $user_status, 'username' => $user->fullname, 'class' => $class, 'profile_image' => $imgs_profile]);
                    } else {
                        return response()->json(['status' => 'error', 'message' => 'Something went wrong.']);
                    }
                }
            } else {
                return response()->json(['status' => 'error', 'message' => 'User not exists. Kindly register.']);
            }
        }
    }

    public function signupUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required',
            'country_code' => 'required',
            'fullname' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => 'All field are required']);
        } else {
            $result = User::where(['mobile' => $request->mobile, 'country_code' => $request->country_code])->first();
            if ($result) {
                return response()->json(['status' => 'error', 'message' => 'User already exists.']);
            } else {
                $user = new User();
                $user->mobile = $request->mobile;
                $user->fullname  = $request->fullname;
                $user->country_code  = $request->country_code;
                // $user->wtsap_notify = $request->wtsap_notify;
                $user->login_type  = 'mobile';
                $user->role_status = 1;
                $user->save();
                if (Auth::loginUsingId($user->id)) {
                    $user = Auth::user();
                    $token =  $user->createToken('MyApp')->plainTextToken;
                    $user_status =  $user->user_status;
                    return response()->json(['status' => 'success', 'message' => 'User registered successfully', 'userid' => $user->id, 'token' => $token, 'user_status' => $user_status]);
                } else {
                    return response()->json(['status' => 'error', 'message' => 'Something went wrong.']);
                }
            }
        }
    }

    public function logoutUser()
    {
        Auth::user()->tokens()->delete();
        return response()->json(['status' => 'success', 'message' => 'Successfully logged out']);
    }

    public function allclasses()
    {
        $classes = Classes::active()->get();
        if (!empty($classes)) {
            return response()->json(['status' => 'success', 'message' => 'All classes', 'classes' => $classes]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'No classes found.']);
        }
    }


    public function allboards()
    {
        $boards = Board::active()->get();
        if (!empty($boards)) {
            return response()->json(['status' => 'success', 'message' => 'All boards', 'boards' => $boards]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'No boards found.']);
        }
    }



    public function userData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'class_id' => 'required',
            // 'exam_id' => 'required',
            'board_id' => 'required',
            // 'user_stream' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => 'All field are required']);
        } else {


            $user = User::find($request->user_id);
            $user->class_id = $request->class_id;
            $user->board_id = $request->board_id;
            // $user->exam_id = $request->exam_id;
            if (isset($request->user_stream)) {
                $user->user_stream = $request->user_stream;
            }
            $user->save();
            $class_data = Classes::where('id', $request->class_id)->first();
            if ($user->avatar == '') {
                $imgs_profile = asset('admin-assets/img/avata.jpg');
            } else {
                $imgs_profile = asset('admin-assets/img/students/' . $user->avatar);
            }
            if ($user) {
                return response()->json(['status' => 'success', 'message' => 'User data added successfully', 'username' => $user->fullname, 'class' => $class_data->name, 'profile_image' => $imgs_profile]);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Something went wrong.']);
            }
        }
    }
    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'email' => 'required',
            
        ]);
        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()->first()]);
        } else {

            $inputs =  $request->all();
            $return_data = Auth::user();
            if ($return_data) {
                $update_profile = User::where('id', $return_data->id)->first();
                $update_profile->email = $inputs['email'];
                $update_profile->fullname = $inputs['fullname'];
                if (isset($_FILES['avatar']) && $_FILES['avatar']['name'] != '') {
                    if (
                        File::exists('public/admin-assets/img/students/' . $return_data->avatar)
                        && $return_data->avatar != ''
                    ) {
                        unlink('public/admin-assets/img/students/' . $return_data->avatar);
                    }
                    $img_name = time() . 'avatar' . '-' . Str::of(md5(time() . $request->file('avatar')
                        ->getClientOriginalName()))
                        ->substr(0.50) . '.' . $request->file('avatar')
                        ->extension();

                    $path = $request->file('avatar')
                        ->storeAs('admin-assets/img/students', $img_name);
                    $update_profile->avatar = $img_name;
                }
                if ($update_profile->save()) {
                    return response(['status' => 'success', 'message' => 'Successfully Update Profile']);
                } else {
                    return response(['status' => 'error', 'message' => 'Something went wrong']);
                }
            }
        }
    }
    public function getProfie()
    {

        $return_data = User::where('id',Auth::user()->id)->first(['fullname', 'email', 'country_code', 'mobile', 'login_type', 'avatar']);
        if (!empty($return_data->avatar)) {
            $return_data->avatar = asset('admin-assets/img/students/' . $return_data->avatar);
        }else{
            $return_data->avatar=asset('admin-assets/img/avata.jpg');
        }
        if (!empty($return_data)) {
            return response(['status' => 'success','message' =>'profile data', 'data' => $return_data]);
        } else {
            return response(['status' => 'error', 'message' => 'Something went wrong']);
        }
    }
}
