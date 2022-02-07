@extends('layout.layout-admin')

@section('page-title', 'Tạo câu hỏi')
@section('main')
    <main class="col-md-9">
        {{--  thêm câu hỏi và đáp án cho quiz --}}

        {{-- <h4 class="text-center mt-4">Thêm câu hỏi vào quizs '{{$quizName}}'</h4> --}}
        @if (session('msg'))
            <div class="alert alert-success">{{ session('msg') }}</div>
        @endif
        @if (session('fail'))
            <div class="alert alert-danger">{{ session('fail') }}</div>
        @endif
        <a class="btn btn-info" href="{{route('admin.quiz.detail',['id'=>$quiz_id->id])}}"><- Quay lại </a>
        <div class="content d-flex justify-content-center">
            <form action="" method="POST" class="col-md-6 " enctype="multipart/form-data">
                @csrf
                <h3 class="m-3 text-center">Thêm câu trả lời cho câu hỏi '{{$question_name->name}}'</h3>
                @if ($question->img)
                    <img src="{{asset('uploads/'.$question->img)}}" width="80px" alt="">   
                @endif
                <div class="form-group">
                    <label for="">Nội dung</label>
                    <textarea name="content" id="" cols="30" rows="2" class="form-control" placeholder="Nội dung câu trả lời">{{old('content')}}</textarea>
                    @error('content')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <input type="hidden" name="question_id" value="{{$question_id}}">

                <div class="form-group">
                    <label for="">Đây là câu trả lời? </label>
                    <br>
                    <input type="radio" value="1" name="is_correct" id="cr1" class="mr-3"><label for="cr1">Đúng</label>
                    <br>
                    <input type="radio" value="0" name="is_correct" id="cr2" class="mr-3"><label for="cr2">Sai</label>
                    @error('is_correct')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mb-4">Thêm</button>
            </form>
        </div>
    </main>
@endsection
