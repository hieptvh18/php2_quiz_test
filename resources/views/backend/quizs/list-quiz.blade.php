@extends('layout.layout-admin')
@section('page-title', 'Danh sách quiz')
@section('main')


    <main class="col-md-9">
        <div class="title mt-4 mb-3">
            <h4>Quản lý quiz</h4>

        </div>

        <div class="content">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>tên quiz</th>
                        <th>Môn</th>
                        <th>Thời gian</th>
                        <th>Ngày hiệu lực</th>
                        <th>Ngày hết hạn</th>
                        <th>Tình trạng</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listQuiz as $key=>$item)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->sbj_name}}</td>
                            <td>{{$item->duration_minutes}}'</td>
                            <td>{{$item->start_time}}</td>
                            <td>{{$item->end_time}}</td>
                            <td>
                                @if ($item->status == 1)
                                    <span class="bg-success text-light p-2">Hiện</span>
                                @else
                                    <span class="bg-secondary text-light p-2">Ẩn</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('admin.quiz.detail',['id'=>$item->id])}}" class="btn btn-info">Xem chi tiết -></a>
                                <a href="{{route('admin.quiz.result',['id'=>$item->id])}}" class="btn btn-secondary">Quản lý</a>
                                <a href="{{route('admin.quiz.edit',['id'=>$item->id])}}" class="btn btn-warning">Sửa</a>
                                <a href="{{route('admin.quiz.remove',['id'=>$item->id])}}" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn xóa quiz! Tất cả thông tin liên quan sẽ bị xóa cùng!')">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
