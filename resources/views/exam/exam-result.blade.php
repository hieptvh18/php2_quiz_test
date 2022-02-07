@extends('layout.layout')
@section('page-title', 'Kết quả bài thi')
@section('main')


    <main>
        <h4 class="m-4 text-center">Kết quả bài quiz</h4>
        {{-- <p>{{$}}</p> --}}
        @foreach($result as $item)

        <h4 class="text-center">Điểm số bài quiz: {{$item->score}}</h4>
        <p>Thời gian bắt đầu làm: {{$item->start_time}}</p>
        <p>Thời gian nộp bài: {{$item->end_time}}</p>
        <p>Số câu chính xác: ...</p>
        @endforeach
        
    </main>

@endsection
