@extends('layout.layout')
@section('page-title','Trang chủ')
@section('main')
    

<main>
    <div class="form-join-quiz">
        <form action="">
            <input type="search" name="key_join" placeholder="Nhập mã lớp" required>
            <button type="submit" name="btnJoin" class="btn btn-info">Tham gia</button>
        </form>
    </div>

    <!-- list courses -->
    <h4>Khóa học của bạn</h4>
    <div class="list-courses">

        {{-- lặp + render --}}
        @foreach ($listCourse as $item)
        <a href="{{route('client.subject.list',['id'=>$item->id])}}" class="item">
            <div class="avatar">
                <img src="../public/images/java-640x427.jpg" alt="">
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
