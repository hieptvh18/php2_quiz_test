<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AccountController extends Controller
{
    // action & display login
    public function login(Request $rq)
    {
        if ($rq->isMethod('POST')) {
            $email = $rq->input('email');
            $password = $rq->input('password');

            $userInfo = User::where('email', '=', $email)->first();

            if (!$userInfo) {
                return back()->with('fail', 'Tài khoản không tồn tại! Vui lòng thử lại!');
            }
            // chceck pass

            if (Hash::check($password, $userInfo->password)) {
                // check role_id = 2 là client 1 = admin->dashboard
                if($userInfo->role_id == 2){
                    // lưu session
                    $rq->session()->put('student',$userInfo);
                    return redirect()->route('client.home');
                }else{
                    $rq->session()->put('teacher',$userInfo);
                    return redirect()->route('admin.dashboard');
                }

            } else {
                return back()->with('fail','Mật khẩu không chính xác!');
            }
        }

        return view('layout.login');
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
                'avatar' => 'required'
            ]);
            // // check email exist
            // if (DB::table('users')->where('email', $rq->email)->exists()) {
            //     return redirect()->route('register')->with('message', 'Email đã tồn tại!');
            // }

            // chưa tt-> register
            // insert
            $model = new User();
            $model->fill($rq->all());

            // mã hóa password
            $model->password = Hash::make($rq->password);
            $model->role_id = 1;
            $save = $model->save();

            if ($save) {
                // upload img
                $rq->file('avatar')->store('uploads');
                return back()->with('message', 'Đăng kí tài khoản thành công!');
            } else {
                return back()->with('message', 'Đăng kí thất bại! Vui lòng thử lại!');
            }

            // return redirect()->route('register')->with('message','Đăng kí tài khoản thành công!');
        }

        return view('layout.register');
    }

    // action logout

    public function logout(){
        if(session()->has('student')){
            session()->pull('student');
            return redirect()->route('login')->with('message','Đăng xuất thành công');
        }
        elseif(session()->has('teacher')){
            session()->pull('teacher');
            return redirect()->route('login')->with('message','Đăng xuất thành công');
        }
    }
}
