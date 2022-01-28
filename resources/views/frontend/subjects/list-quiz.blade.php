@extends('layout.layout')
@section('page-title','Danh sách quiz')
@section('main')
    

<main>
    <div class="title mt-4 mb-3">
        @if ($myQuiz)
        <h4>Danh sách bộ quiz của {{$quizTitle->name}}</h4>
        @endif
        
    </div>

    <div class="content">
        {{-- nếu exsit thì lăp --}}
       
       
        @foreach ($myQuiz as $key=>$item)
            
            <div class="alert alert-secondary">
                <span>{{$key+1}}.</span>
                @if (session('teacher'))
                    <a href="{{route('client.quiz.exam',['id'=>$item->id])}}" onclick="return confirm('Bắt đầu vào làm quiz?')">{{$item->name}}</a>
                    <a href="{{route('admin.quiz.remove',['id'=>$item->id])}}" onclick="return confirm('Bạn chắc chắn muốn xóa quiz! Tất cả thông tin liên quan cũng sẽ bị xóa!')" class=" ml-3 btn btn-danger">Xóa quiz</a>
                @else
                <a href="{{route('client.quiz.exam',['id'=>$item->id])}}" onclick="return confirm('Bắt đầu vào làm quiz?')">{{$item->name}}</a>
                @endif
            </div>

        @endforeach
        
    </div>
</main>
@endsection
