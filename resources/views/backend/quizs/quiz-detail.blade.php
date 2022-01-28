@extends('layout.layout-admin')
@section('page-title', 'For teacher')
@section('main')


    <main class="col-md-9">
        <div class="title mt-4 mb-3">
            <h4>Quản lý câu hỏi quizs / {{ $quizName->name }}</h4>

        </div>

        <div class="content-quiz bg-light mb-4">
            @if (session('msg'))
                <div class="alert alert-success">{{ session('msg') }}</div>
            @endif
            @if (session('fail'))
                <div class="alert alert-danger">{{ session('fail') }}</div>
            @endif
            @if (session('teacher'))
                <a href="{{ route('admin.quiz.add-question', ['id' => $quizId]) }}" class="mb-3 btn btn-secondary">Thêm bộ
                    câu hỏi +</a>
            @endif
            {{-- lặp toàn bộ câu hỏi, lồng bên trong là đáp án ok --}}
            @foreach ($listQues as $key => $q)
                <div class="item  p-3 mb-3">
                    <div class="ques mb-3 alert alert-secondary d-flex justify-content-between">
                        <span> {{ $key + 1 }}.{{ $q->name }} ?</span>
                        <a href="{{ route('admin.quiz.remove-question', ['id' => $q->id]) }}" class="btn btn-danger">Xóa</a>
                    </div>
                    @if ($q->img)
                        <div class="mt-2 mb-3">
                            <img src="{{ asset('uploads/' . $q->img) }}" width="100px" alt="">
                        </div>
                    @endif
                    <div class="list-answer pl-3 pr-3">
                        @foreach (getAnswer($q->id) as $key2 => $a)
                            <p>
                                <label for="">{{ $key + 1 }}.{{ $key2 + 1 }}. {{ $a->content }};</label>
                                <a href="{{ route('admin.quiz.remove-answer', ['id' => $a->id]) }}" class="ml-4">
                                    <i class="fa fa-trash-o text-danger" aria-hidden="true"></i>
                                </a>
                            </p>
                        @endforeach
                    </div>
                </div>
            @endforeach

        </div>
    </main>
@endsection
