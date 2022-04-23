<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Socialite;
use App\Models\User;

class GoogleController extends Controller
{
    //
    public function redirectToGoogle(){
        return Socialite::driver('google')->stateless()->redirect();
    }

    // xử lí sau khi login google (check và lưu thông tin cho lần tới)
    public function googleCallback(){
        $user = Socialite::driver('google')->stateless()->user();
        // lưu
        if(!empty($user)){
            Auth::Login($user);
            // check role và lưu session thôi
           session(['student'=>$user]);
            
            return redirect(route('client.home'))->with('msg','Đăng nhập thành công');
        }else{
            // ko có data
            User::create([
                "name"=>$user->name,
                "email"=>$user->email,
                "google_id"=>$user->id
                
            ]);
           session(['student'=>$user]);

            // check role và lưu session thôi
            // Auth::login($user);

            return redirect(route('client.home'))->with('msg','Đăng nhập thành công');
        }
    }


}
