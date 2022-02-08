@extends('layout.layout-admin')
@section('page-title', 'For admin')
@section('main')


    <main class="col-md-9">
        <div class="title mt-4 mb-3">
            <h4>Thống kê kết quả bài quiz '{{$quiz->name}}'</h4>

        </div>
        <div class="filter mb-4">
            <select name="filter_score" id="">
                <option selecte disabled>Lọc theo điểm</option>
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
                        <th>Số câu đã làm</th>
                        <th>Số câu chính xác</th>
                        <th>Bắt đầu làm</th>
                        <th>Nộp bài</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
            </table>
        </div>
    </main>

    {{-- js --}}
    <script>

    </script>
@endsection
