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
    <title>Đăng kí tài khoản</title>
</head>

<body>
    <div class="wrapper fadeInDown">
        <div class="menu">
            <a href="{{ route('client.home') }}" class="mb-4">Về trang chủ</a>
        </div>
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <img src="{{ asset('images/logo.png') }}" alt="User Icon" width="80px" />
            </div>

            <!-- Login Form -->
            <h4 class="text-center ">Đăng kí tài khoản</h4>
            @if (session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" id="fullname" class="fadeIn second" name="name" value="{{old('name')}}" placeholder="Tên đầy đủ" >
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <input type="text" id="name" class="fadeIn second" value="{{old('email')}}" name="email" placeholder="email" >
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <input type="password" id="password" value="" class="fadeIn third" name="password" placeholder="password">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                

              <div class="form-group">
                <p>Vai trò</p>
                <input type="radio" id="role1" value="1" class="fadeIn second" name="role_id">
                <label for="role1" class="mr-2">Sinh viên</label>
                <input type="radio" id="role2" value="2" class="fadeIn second" name="role_id">
                <label for="role2">Giáo viên</label>
              </div>
                @error('role_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <input type="submit" name="btnRegister" class="fadeIn fourth" value="Đăng kí">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="{{ route('auth.login') }}">Đăng nhập?</a>
            </div>

            <div class="login-gg">
            </div>

        </div>
    </div>
</body>

</html>
