<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css
">
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>login</title>
</head>

<body>
    <div class="wrapper fadeInDown">
        <div class="menu">
            @if(Session::get('student') || Session::get('teacher'))
            <a href="{{ route('client.home') }}" class="mb-4">Về trang chủ</a>
        @endif
        </div>
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <img src="{{ asset('images/logo.png') }}" alt="User Icon" width="80px" />
            </div>

            <!-- Login Form -->
            <h4 class="text-center ">Đăng nhập quiz test Poly</h4>
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            @if (session('fail'))
                <div class="alert alert-danger">{{ session('fail') }}</div>
            @endif

            <form action="" method="POST">
                @csrf
                <input type="text" id="name" class="fadeIn second" value="{{ old('email') }}" name="email" placeholder="email">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <input type="password" id="password" value="" class="fadeIn third" name="password"
                    placeholder="password">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="remember">
                    <input type="checkbox" name="remember" id="remember" class="mr-2">
                    <label for="remember">Nhớ thông tin</label>
                </div>
                <input type="submit" class="fadeIn fourth" value="Đăng nhập">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="#">Forgot Password?</a>
                <a class="underlineHover" href="{{ route('register') }}">Đăng kí tài khoản</a>
            </div>

            <div class="login-gg">
                <a href="" class="btn btn-primary form-control">Đăng nhập bằng google</a>
            </div>

        </div>
    </div>
</body>

</html>
