<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class AuthLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // check cookie 
        
        // check đã login mới dc vào app
        if(!$request->session()->has('student') && !$request->session()->has('teacher')){
            return redirect()->route('auth.login')->with('message','Hãy đăng nhập để vào website!');
        }

        return $next($request);

    }
    // action

}
