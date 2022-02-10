@extends('layout.layout-admin')

@section('page-title', 'Tạo câu hỏi')
@section('main')
    <main class="col-md-9">
        {{--  thêm câu hỏi và đáp án cho quiz --}}

        <h4 class="text-center mt-4">Thêm câu hỏi vào quizs '{{$quizName->name}}'</h4>
       
        @if (session('msg'))
            <div class="alert alert-success">{{ session('msg') }}</div>
        @endif
        @if (session('fail'))
            <div class="alert alert-danger">{{ session('fail') }}</div>
        @endif
        <a class="btn btn-info" href="{{route('admin.quiz.edit',['id'=>$quizId])}}"><- Quay lại </a>
        <div class="content d-flex justify-content-center">
            <form action="" method="POST" class="col-md-6 " enctype="multipart/form-data">
                <h3 class="m-3 text-center">Thêm câu hỏi </h3>
                @csrf
                <div class="form-group">
                    <label for="">Tên câu hỏi</label>
                    <input type="text" placeholder="Enter name" name="name" class="form-control"
                        value="{{ old('name') }}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <input type="hidden" name="quiz_id" value="{{$quizId}}">
                
                <div class="form-group">
                    <label for="">Ảnh </label>
                    <input type="file" name="img" class="form-control">
                    @error('img')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <br>

                <button type="submit" class="btn btn-primary mb-4">Thêm</button>
            </form>
        </div>
    </main>
@endsection
