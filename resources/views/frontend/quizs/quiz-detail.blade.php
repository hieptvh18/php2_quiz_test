@extends('layout.layout')
@section('page-title','For student')
@section('main')
    

<main>
    <div class="title mt-4 mb-3">
        <h4>Danh sách quizs / {{$quizName->name}}</h4>

    </div>

    <div class="content-quiz bg-light mb-4">
        <a href="{{route('admin.quiz.add-question',['id'=>$quizId])}}" class="btn btn-secondary">Thêm bộ câu hỏi +</a>
        <form action='' method="POST">
            @csrf

            @php
                $n = 1;   
            @endphp
            @foreach ($contentQuiz as $item)
                <div class="item  p-3 mb-3">
                    <div class="ques mb-3 alert alert-secondary">
                        {{$n}}.{{$item->name}} ?
                    </div>
                    <div class="list-answer">

                        <p>
                            <input type="radio" id="as1" name="answer" value="">
                            <label for="as1">1.System.out.print('Hello world!');</label>
                        </p>
                       
                    </div>

                </div>
                @php
                    $n++;
                @endphp
            @endforeach

            
            <button type="submit" class="btn btn-info mt-3">Gửi</button>
        </form>
    </div>
</main>
@endsection
