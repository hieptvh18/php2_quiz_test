@extends('layout.layout')
@section('page-title', 'Quản trị')
@section('main')
    <main>
        <div class="hello">
            <h4 class="text-center mt-3">Welcome thầy {{session('teacher')->name}} đẹp troai đến với trang quản trị Quiz test</h4>
            <h5 class="text-center text-primary m-4"><i class="fa fa-list mr-2" aria-hidden="true"></i>
                 Danh sách bộ môn của bạn</h5>
        </div>
        <div class="admin-filter">

        </div>
        <div class="content">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên môn học</th>
                        <th>Ảnh đại diện</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $n = 1;
                    @endphp
                    @foreach ($listCourse as $item)
                        <tr>
                            <td>{{$n}}</td>
                            <td>{{$item->id}}</td>
                            <td><img src="" width="40px" alt="">{{$item->avatar}}</td>
                            <td>
                                <a href="" class="btn btn-info">Bài quiz-></a>
                                <a href="" class="btn btn-warning">Sửa</a>
                                <a href="" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn xóa Môn học? Tất cả bài quiz của môn cũng sẽ mất!')">Xóa</a>
                            </td>
                        </tr>
                        @php
                            $n++;
                        @endphp
                    @endforeach
                </tbody>

            </table>
        </div>
    </main>
@endsection
