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

use Mail;
use App\Mail\AuthRegisterMail;

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
                'role_id' => 'required'
            ]);

            // gửi code
            $code =  substr(rand(0, 999999), 0, 6);
            $this->sendMailRegister($rq->input('email'),$code);
            
            // lưu session input
            $rq->session('resgiter_input')->put($rq->all());
            
           // gọi form nhập code
           return redirect()->route('auth.confirm-register-view');

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

    // xử lí code register
    public function handleConfirmRegister(Request $rq)
    {
       
        $rq->validate([
            'code'=>'required'
        ]);
        // check code
        if(session('code_register') == $rq->input('code')){

            if(!User::where('email',session('email'))->first()){
                // get input từ session trung gian để lưu db account
                $model = new User();
        
                $model->name = session('name');
                $model->email = session('email');
                $model->role_id = session('role_id');
                // mã hóa password
                $model->password = Hash::make(session('password'));
                $save = $model->save();
        
                if ($save) {
                    // upload img
                    return redirect()->route('auth.login')->with('message', 'Đăng kí tài khoản thành công!');
                } else {
                    return back()->with('message', 'Đăng kí thất bại! Vui lòng thử lại!');
                }
            }
            return back()->with('message', 'email is exist!');
        }else{
            
            return back()->with('message', 'Mã code không hợp lệ!');
        }

    }

    // handle confirm
    public function confirmRegister(Request $rq)
    {

    }

    // truyền data gửi mail

    public function sendMailRegister($mailTo,$code)
    {
        // tạo sesison lưu code để check
        session(['code_register' => $code]);

        $mailData = [
            'title' => 'Mail xác nhận đăng kí tài khoản Quiz POLY',
            'code' => $code
        ];

        Mail::to($mailTo)->send(new AuthRegisterMail($mailData));

    }

    // forgot password

    public function forgotPass(){
        
    }

}
