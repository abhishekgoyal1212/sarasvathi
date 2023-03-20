<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Prefix
{

    public function handle(Request $request ,Closure $next)
    {

        if (Auth::guard('admin')->check()) {
            $pre_fix = 'admin';
        }
        if (Auth::guard('school')->check()) {
            $pre_fix = 'school';
        }
        if (Auth::guard('tutor')->check()) {
            $pre_fix = 'tutor';
        }
        if (Auth::guard('instructor')->check()) {
            $pre_fix = 'instructor';
        }

        $request->request->add(['pre_fix' => $pre_fix]);
        // pre($request->pre_fix);
        return $next($request);
        // return $request->pre_fix;
    }
}
