@extends('layout.layout-admin')
@section('page-title', 'For admin')
@section('main')

    <main class="col-md-9">
        <div class="title mt-4 mb-3">
            <h4>Thống kê kết quả bài quiz '{{ $quizName->name }}'</h4>
        </div>
        <div class="filter mb-4">
            <select name="filter_score" id="filter_score">
                <option selected disabled>Lọc theo điểm</option>
                <option value="1">Cao -> thấp</option>
                <option value="2">Thấp -> cao</option>
            </select>
        </div>

        <div class="content">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Điểm</th>
                        <th>Bắt đầu làm</th>
                        <th>Nộp bài</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quizs as $key => $val)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $val->fullname }}</td>
                            <td>{{ $val->email }}</td>
                            <td>{{ $val->score }}</td>
                            <td>{{ $val->start_time_exam }}</td>
                            <td>{{ $val->end_time_exam }}</td>
                            {{-- <td><a href="" class="btn btn-info">Chi tiết</a></td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>


@endsection
