@extends('layout.layout')
@section('page-title','Trang chủ')
@section('main')
    

<main>
    <div class="form-join-quiz">
        <form action="">
            <input type="search" name="key_search"  placeholder="Nhập tên bài quiz" required>
            <button type="submit" class="btn btn-info">Tìm kiếm</button>
        </form>
    </div>

    <!-- list courses -->
    <h4>{{$page_title}}</h4>
    <div class="list-courses">

        {{-- lặp + render --}}
        @foreach ($listCourse as $item)
        <a href="{{route('client.subject.list',['id'=>$item->id])}}" class="item">
            <div class="avatar">
                <img src="{{asset('uploads/'.$item->avatar)}}" alt="">
            </div>
            <div class="course-name ml-2">
                {{$item->name}}
            </div>
            <div class="course-info ml-2">
                <span class="">{{$item->countQuiz}} Bài quiz</span>
                <span class="">12 người tham gia</span>
            </div>
        </a>
        @endforeach

       
    </div>
</main>

@endsection
