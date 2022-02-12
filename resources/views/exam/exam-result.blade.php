@extends('layout.layout')
@section('page-title', 'Kết quả bài thi')
@section('main')


    <main>
        <h4 class="m-4 text-center">Kết quả bài quiz</h4>
        {{-- <p>{{$}}</p> --}}
        <h4 class="text-center">Điểm số bài quiz: {{$result->score}}/10</h4>

        <p>Thời gian bắt đầu làm: {{$result->start_time}}</p>
        <p>Thời gian nộp bài: {{$result->end_time}}</p>
        <p>Tổng câu hỏi: {{$totalQues->countQues}}</p>
        <p>Số câu đúng: {{$true}}</p>
        <p>Số câu sai: {{$false}}</p>
        
    </main>

@endsection
