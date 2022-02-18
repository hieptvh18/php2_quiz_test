<!DOCTYPE html>
<html lang="en">

{{-- include head --}}
@include('frontend.blocks.head')

<body>
    <div class="container-fluid">
        {{-- include header --}}
        @include('frontend.blocks.header')

        <div class="content-main row">
            <div class="side-bar col-md-2 mr-3 bg-white border">
                <h5 class="text-center mt-3">ADMIN QUIZ TEST POLYME</h5>
                <a href="{{route('admin.dashboard')}}" class="nav-link">
                   1. Danh sách môn học
                </a>

                <a href="{{route('admin.quiz.list')}}" class="nav-link">
                    2. Danh sách quizs
                 </a>
                
            </div>
            <!-- main -->
            @yield('main')
        </div>

    </div>

    <!-- js -->
        @include('frontend.blocks.script')

        @yield('page-script')
</body>

</html>