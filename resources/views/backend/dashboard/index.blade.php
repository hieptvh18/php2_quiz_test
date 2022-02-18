@extends('layout.layout-admin')
@section('page-title', 'Quản trị')
@section('main')
    <main class="col-md-9">
        <div class="hello">
            <h4 class="text-center mt-3">Welcome thầy {{session('teacher')->name}} đến với trang quản trị Quiz test</h4>
            <h5 class="text-center text-primary m-4"><i class="fa fa-list mr-2" aria-hidden="true"></i>
                 Danh sách bộ môn của bạn</h5>
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
                            <td>{{$item->name}}</td>
                            <td><img src="{{asset('uploads/'.$item->avatar)}}" width="60px" alt=""></td>
                            <td>
                                <a href="{{route('admin.subject.list-quiz',['id'=>$item->id])}}" class="btn btn-info">Bài quiz-></a>
                                <a href="{{route('admin.subject.edit',['id'=>$item->id])}}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>

                                </a>
                                <a href="{{route('admin.subject.del',['id'=>$item->id])}}" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn xóa Môn học? Tất cả bài quiz của môn cũng sẽ mất!')"><i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
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
