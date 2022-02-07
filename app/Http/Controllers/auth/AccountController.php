<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use App\Models\User;

class AccountController extends Controller
{
    // action & display login
    public function login(Request $rq)
    {
        if ($rq->isMethod('POST')) {
            $email = $rq->input('email');
            $password = $rq->input('password');

            $rq->validate([
                'email' => 'required',
                'password' => 'required'
            ]);
            $userInfo = User::where('email', '=', $email)->first();

            // email fail
            if (!$userInfo) {
                return back()->with('fail', 'Tài khoản không tồn tại! Vui lòng thử lại!');
            }
            // chceck pass

            if (Hash::check($password, $userInfo->password)) {

                // check remember save cookie
                if ($rq->input('remember')) {

                } else {
                 
                }

                // check role_id = 2 là client 1 = admin->dashboard
                if ($userInfo->role_id == 2) {
                    // lưu session
                    $rq->session()->put('student', $userInfo);
                    return redirect()->route('client.home');
                } else {
                    $rq->session()->put('teacher', $userInfo);
                    return redirect()->route('admin.dashboard');
                }
            } else {
                return back()->with('fail', 'Mật khẩu không chính xác!');
            }

            return back()->with('fail', 'Fail');
        }

        return view('auth.login');
    }

    // action register acc
    public function register(Request $rq)
    {
        // get data
        if ($rq->isMethod('POST')) {

            // validate
            $rq->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:5',
                'avatar' => 'required',
                'role_id' => 'required'
            ]);

            // insert
            $model = new User();
            $model->fill($rq->all());

            // mã hóa password
            $model->password = Hash::make($rq->password);
            $save = $model->save();

            if ($save) {
                // upload img
                $rq->file('avatar')->store('uploads');
                return redirect()->route('login')->with('message', 'Đăng kí tài khoản thành công!');
            } else {
                return back()->with('message', 'Đăng kí thất bại! Vui lòng thử lại!');
            }
        }

        return view('auth.register');
    }

    // action logout
    public function logout()
    {
        // hủy ss
        if (session()->has('student')) {
            session()->pull('student');
            return redirect()->route('login')->with('message', 'Đăng xuất thành công');
        } elseif (session()->has('teacher')) {
            session()->pull('teacher');
            return redirect()->route('login')->with('message', 'Đăng xuất thành công');
        }

        // hủy cookie
        // if(Cookie::get('loginPassword')){
        //     die('hi cookie');
        // }

    }

    // handle set cookie
    public function setCookie($name, $value, $time)
    {
        // check lưu cc
        $response = new Response();
        $response->withCookie($name,$value,$time);
        return $response;
    }

    // handle get cookie
    public function getCookie($name){
        return Cookie::get($name);
    }
}
