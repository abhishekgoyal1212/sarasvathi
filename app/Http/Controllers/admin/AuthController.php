<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\AuthMail;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function loginAuth(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $data = [
            'email' => $req->email,
            'password' => $req->password,
            'user_status' => 1
        ];

        if (Auth::guard('admin')->attempt($data)) {
            return redirect()->route('admin.dashboard');
        }
        // if (Auth::guard('school')->attempt($data)) {
        //     return redirect()->route('admin.dashboard');
        // }
        // if (Auth::guard('instructor')->attempt($data)) {
        //     return redirect()->route('admin.dashboard');
        // }
        return back()->with('flash-error', 'Invalid credentials')->withInput();
    }


    public function loginTutor(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $data = [
            'email' => $req->email,
            'password' => $req->password,
            'user_status' => 1
        ];

        if (Auth::guard('tutor')->attempt($data)) {
            return redirect()->route('tutor.dashboard');
        }
        return back()->with('flash-error', 'Invalid credentials')->withInput();
    }



    public function loginInstructor(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $data = [
            'email' => $req->email,
            'password' => $req->password,
            'user_status' => 1
        ];

        if (Auth::guard('instructor')->attempt($data)) {
            return redirect()->route('instructor.dashboard');
        }
        return back()->with('flash-error', 'Invalid credentials')->withInput();
    }


    public function loginSchool(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $data = [
            'email' => $req->email,
            'password' => $req->password,
            'user_status' => 1
        ];

        if (Auth::guard('school')->attempt($data)) {
            return redirect()->route('school.dashboard');
        }
        return back()->with('flash-error', 'Invalid credentials')->withInput();
    }

    public function logout()
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login');
        }
        if (Auth::guard('school')->check()) {
            Auth::guard('school')->logout();
            return redirect()->route('school.login');
        }
        if (Auth::guard('tutor')->check()) {
            Auth::guard('tutor')->logout();
            return redirect()->route('tutor.login');
        }
        if (Auth::guard('instructor')->check()) {
            Auth::guard('instructor')->logout();
            return redirect()->route('instructor.login');
        }
        // return redirect()->route('admin.login');
    }

    public function forgotEmailVerify(Request $req)
    {
        $req->validate(
            [
                'email' => 'required|email|exists:' . ADMIN,
            ],
            [
                'email.exists' => 'This email not exist in our records',
            ]
        );

        $input = $req->input();

        $token = Str::random(40);
        $expire_key_time = date("Y-m-d H:i:s", strtotime("+30 minutes"));

        $data = [
            'forget_key' => $token,
            'expire_forget_key' => $expire_key_time,
        ];

        $result = Admin::where('email', $input['email'])->update($data);
        $data = [
            'link' => $token,
            'msg' => $expire_key_time,
        ];
        $mail_data = [
            "heading" => "Reset Password",
            "link" => route('admin.reset-password', $token),
            "msg" => "If you've lost password or wish to reset it, use the link below to get started.",
            "btn_text" => "Reset Your Password",
            "footer" => 'If you did not request a password reset, you can safely ignore this email. Only a person with access to your email can reset your account password.',
        ];

        Mail::to($input['email'])->send(new AuthMail($mail_data));

        if ($result) {
            return back()->with('flash-success', 'A password reset link has been sent to your email')->withInput();
        } else {
            return back()->with('flash-error', 'Some error occurred')->withInput();
        }
    }

    public function resetPassword($token = '')
    {
        $info = Admin::where('forget_key', $token)->firstOrFail();
        return view('admin/auth/reset-password', compact('token', 'info'));
    }

    public function verifyResetPassword(Request $req, $token)
    {
        $req->validate(
            [
                'password' => 'required|min:6|max:15',
                'password_confirmation' => 'required|same:password',
            ],
            [
                'password_confirmation.confirmed' => 'The password confirmatoin does not match',
            ]
        );

        $input = $req->input();
        $current_time = date("Y-m-d H:i:s");
        $info = Admin::where('forget_key', $token)->first();

        if (strtotime($info->expire_forget_key) < strtotime($current_time)) {
            return back()->with('flash-error', 'Password reset link has been expired');
        } else {
            $data = Admin::where('forget_key', $token)->first();
            $data->password = Hash::make($input['password']);

            if ($data->save()) {
                return redirect()->route('admin.login')->with('flash-success', 'Password changed successfully');
            } else {
                return back()->with('flash-error', 'Some error occurred in changing password');
            }
        }
    }
}
