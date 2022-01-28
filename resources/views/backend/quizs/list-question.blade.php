@extends('layout.layout-admin')
@section('page-title', 'Danh sách câu hỏi')
@section('main')
    <main class="col-md-9">
        <div class="hello">
            <h4 class="text-center mt-3">Welcome thầy {{session('teacher')->name}} đẹp troai đến với trang quản trị Quiz test</h4>
            <h5 class="text-center text-primary m-4"><i class="fa fa-list mr-2" aria-hidden="true"></i>
                 Danh sách Câu hỏi của quiz...</h5>
        </div>
        <div class="admin-filter">

        </div>  
        @if (session('msg'))
            <div class="alert alert-success">{{session('msg')}}</div>
        @endif
        <div class="content">
            <a href="{{route('admin.subject.add')}}" class="btn btn-secondary">Thêm Môn Học +</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên quizs</th>
                        <th>Tên câu hỏi</th>
                        <th>Ảnh câu hỏi</th>
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
                            <td>{{$item->name}}</td>
                            <td><img src="{{asset('uploads/'.$item->avatar)}}" width="60px" alt=""></td>
                            <td>
                                <a href="{{route('client.subject.list',['id'=>$item->id])}}" class="btn btn-info">Bài quiz-></a>
                                <a href="{{route('admin.subject.edit',['id'=>$item->id])}}" class="btn btn-warning">Sửa</a>
                                <a href="{{route('admin.subject.del',['id'=>$item->id])}}" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn xóa Môn học? Tất cả bài quiz của môn cũng sẽ mất!')">Xóa</a>
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
