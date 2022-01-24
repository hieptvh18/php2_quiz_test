<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

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
        // check đã login mới dc vào app
        if(!$request->session()->exists('admin','student')){
            return redirect()->route('login')->with('message','Mày phải login để vào web app này!');
        }

        return $next($request);

    }
    // action

}
