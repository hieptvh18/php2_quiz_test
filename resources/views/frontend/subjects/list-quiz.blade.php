@extends('layout.layout')
@section('page-title','Danh sách quiz')
@section('main')
    

<main>
    <div class="title mt-4 mb-3">
        @if ($myQuiz)
        <h4>Danh sách môn quiz của {{$quizTitle->name}}</h4>
        @endif
        
    </div>

    <div class="content">
        {{-- nếu exsit thì lăp --}}
       
        @php
         $n=1;   
        @endphp
        @foreach ($myQuiz as $item)
            
        <div class="alert alert-secondary">
            <span>{{$n}}.</span>
            @if (session('teacher'))
                <a href="{{route('admin.quiz.manage',['id'=>$item->id])}}">{{$item->name}}</a>
                <a href="" class=" ml-3 btn btn-danger">Xóa quiz</a>
            @else
              <a href="{{route('client.quiz.detail',['id'=>$item->id])}}">{{$item->name}}</a>
            @endif
        </div>

        @php
            $n++;
        @endphp
        @endforeach
        
    </div>
</main>
@endsection
