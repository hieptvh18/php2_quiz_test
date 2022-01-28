@extends('layout.layout-admin')

@section('page-title', 'Sửa quiz')
@section('main')
    <main class="col-md-9">

        <h4 class="text-center mt-4">Cập nhật quizs</h4>
        @if (session('msg'))
            <div class="alert alert-success">{{ session('msg') }}</div>
        @endif
        @if (session('fail'))
            <div class="alert alert-danger">{{ session('fail') }}</div>
        @endif
        <a class="btn btn-info" href="{{route('admin.dashboard')}}">Danh sách </a>
        <div class="content d-flex justify-content-center">
            <form action="" method="POST" class="col-md-6 ">
                @csrf
                <div class="form-group">
                    <label for="">Tên bộ quiz</label>
                    <input type="text" placeholder="Enter name" name="name" class="form-control"
                        value="{{ old('name',$myQuiz->name) }}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Thuộc bộ môn</label>
                    <select name="subject_id" id="" class="form-control">
                        @foreach ($listSubject as $item)
                            @if ($myQuiz->subject_id == $item->id)
                                <option selected value="{{ $item->id }}">{{ $item['name'] }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item['name'] }}</option>
                            @endif
                        @endforeach
                        <option value="0">Môn khác</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Thời gian làm bài</label>
                    <input type="number" placeholder="Enter minutes" name="duration_minutes" class="form-control"
                        value="{{ old('duration_minutes',$myQuiz->duration_minutes) }}">
                    @error('duration_minutes')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Ngày bắt đầu</label>
                    <input type="datetime-local" name="start_time" value="{{old('start_time')?? date('Y-m-d\TH:i', strtotime($myQuiz->start_time)) }}" class="form-control">
                    @error('start_time')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Ngày kết thúc</label>
                    <input type="datetime-local" name="end_time" value="{{old('end_time')?? date('Y-m-d\TH:i', strtotime($myQuiz->end_time)) }}" class="form-control">
                    @error('end_time')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Xáo trộn câu hỏi?</label>
                    <br>
                    <input {{$myQuiz->is_shuffle == 0 ? 'checked':''}} type="radio" id="sf1" value="0" name="is_shuffle" checked class=""> <label
                        for="sf1">Không</label>
                    <input type="radio" {{$myQuiz->is_shuffle == 1 ? 'checked':''}} id="sf2" value="1" name="is_shuffle" class=""> <label for="sf2">Có</label>
                </div>

                <div class="form-group">
                    <label for="">Tình trạng?</label>
                    <br>
                    <input type="radio" id="st1" value="0" name="status" {{$myQuiz->status == 0 ? 'checked':''}}  class=""> <label
                        for="st1">Ẩn với sinh viên</label>
                    <input type="radio" id="st2" value="1" {{$myQuiz->status == 1 ? 'checked':''}} name="status" class=""> <label for="st2">Hiện với sinh viên</label>
                </div>

                {{-- thêm các trường khác --}}

                <button type="submit" class="btn btn-warning mb-4">Cập nhật</button>
            </form>
        </div>
    </main>
@endsection
