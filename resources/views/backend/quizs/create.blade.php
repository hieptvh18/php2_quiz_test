@extends('layout.layout-admin')

@section('page-title', 'Tạo quiz')
@section('main')
    <main class="col-md-9">

        <h4 class="text-center mt-4">Tạo mới quizs</h4>
        @if (session('msg'))
            <div class="alert alert-success">{{ session('msg') }}</div>
        @endif
        @if (session('fail'))
            <div class="alert alert-danger">{{ session('fail') }}</div>
        @endif
        <a class="btn btn-info" href="{{route('admin.dashboard')}}">Danh sách </a>
        <div class="container-fluid">
            <form action="" method="POST" class="">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Tên bộ quiz</label>
                        <input type="text" placeholder="Enter name" name="name" class="form-control"
                            value="{{ old('name') }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
    
                    <div class="form-group  col-md-6">
                        <label for="">Thuộc bộ môn</label>
                        <select name="subject_id" id="" class="form-control">
                            @foreach ($listSubject as $item)
                                <option value="{{ $item->id }}">{{ $item['name'] }}</option>
    
                            @endforeach
                            <option value="0">Môn khác</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Thời gian làm bài</label>
                        <input type="number" placeholder="Enter minutes" name="duration_minutes" class="form-control"
                            value="{{ old('duration_minutes') }}">
                        @error('duration_minutes')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
    
                    <div class="form-group col-md-6">
                        <label for="">Ngày bắt đầu</label>
                        <input type="datetime-local" name="start_time" class="form-control">
                        @error('start_time')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Ngày kết thúc</label>
                        <input type="datetime-local" name="end_time" class="form-control">
                        @error('end_time')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
    
                    <div class="form-group col-md-6">
                        <label for="">Xáo trộn đán án?</label>
                        <br>
                        <input type="radio" id="sf1" value="0" name="is_shuffle" checked class=""> <label
                            for="sf1">Không</label>
                        <input type="radio" id="sf2" value="1" name="is_shuffle" class=""> <label for="sf2">Có</label>
                    </div>
                </div>

                {{-- thêm các trường khác --}}

                <button type="submit" class="btn btn-primary mb-4">Thêm</button>
            </form>
        </div>
    </main>
@endsection
