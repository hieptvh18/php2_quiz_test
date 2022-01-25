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
            return redirect()->route('login')->with('message','Mày phải login để vào web app này!');
        }

        return $next($request);

    }
    // action

}
