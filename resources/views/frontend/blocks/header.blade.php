<header class="header">
    <div class="logo">
        <a href="{{ route('client.home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="">
        </a>
    </div>
    <div class="form-search">
        <form action="">
            <div class="form-inpt">
                <input type="search" placeholder="Tìm bài quiz">
            </div>
            <button type="submit" name="btnSearch">
                <i class="fa fa-search"></i>
            </button>
        </form>
    </div>
    <div class="nav-menu ">
        <a href="{{ route('client.home') }}" class="mr-3">Trang chủ</a>
        <a href="" class="mr-3">Các lớp học</a>
        @if(Session::get('teacher'))
            <a href="{{ route('admin.dashboard') }}" class="mr-3">Quản trị</a>
        @endif
    </div>
    <div class="profile d-flex">
        @if (Session::get('student'))
            <div class="dropdown myProfile ml-3">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    Cá nhân
                </button>
                <div class="dropdown-menu">
                    {{-- <a class="dropdown-item" href="#">Hồ sơ</a> --}}
                    <a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a>
                </div>
            </div>
        @elseif(Session::get('teacher'))
            <a href="{{route('admin.quiz.add')}}" class="btn btn-outline-secondary">Tạo quiz +</a>
            <div class="dropdown myProfile ml-3">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    Cá nhân
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Hồ sơ làm bài</a>
                    <a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a>
                </div>
            </div>
        @else
            <div class="register">
                <a href="{{ route('login') }}" class="btn btn-warning">Đăng nhập</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Đăng ký</a>
            </div>
        @endif
    </div>
</header>
