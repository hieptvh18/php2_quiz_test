@extends('layout.layout')

@section('page-title', 'Tạo câu hỏi')
@section('main')
    <main>
        {{--  thêm câu hỏi và đáp án cho quiz --}}

        {{-- <h4 class="text-center mt-4">Thêm câu hỏi vào quizs '{{$quizName}}'</h4> --}}
        @if (session('msg'))
            <div class="alert alert-success">{{ session('msg') }}</div>
        @endif
        @if (session('fail'))
            <div class="alert alert-danger">{{ session('fail') }}</div>
        @endif
        <a class="btn btn-info" href="{{redirect()->back()}}"><- Quay lại </a>
        <div class="content d-flex justify-content-center">
            <form action="" method="POST" class="col-md-6 " enctype="multipart/form-data">
                @csrf
                <h3 class="m-3 text-center">Thêm câu trả lời cho câu hỏi '{{$question_name->name}}'</h3>
                <div class="form-group">
                    <label for="">Nội dung (éo bt nd j :)))</label>
                    <textarea name="content" id="" cols="30" rows="2" class="form-control" placeholder="Nội dung câu trả lời">{{old('content')}}</textarea>
                    @error('content')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <input type="hidden" name="question_id" value="{{$question_id}}">

                <div class="form-group">
                    <label for="">Đây là câu trả lời? </label>
                    <br>
                    <input type="radio" name="is_correct" id="cr1" class="mr-3"><label for="cr1">Đúng</label>
                    <br>
                    <input type="radio" name="is_correct" id="cr2" class="mr-3"><label for="cr2">Sai</label>
                   
                </div>

                <button type="submit" class="btn btn-primary mb-4">Thêm</button>
            </form>
        </div>
    </main>
@endsection
