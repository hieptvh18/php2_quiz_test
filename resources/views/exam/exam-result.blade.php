@extends('layout.layout')
@section('page-title', 'Kết quả bài thi')
@section('main')


    <main>
        <h4 class="m-4 text-center">Kết quả bài quiz</h4>
        {{-- <p>{{$}}</p> --}}
        <h4 class="text-center">Điểm số bài quiz: {{$result->score}}/10</h4>

        <h6>Thời gian bắt đầu làm: {{$result->start_time}}</h6>
        <h6>Thời gian nộp bài: {{$result->end_time}}</h6>
        <hr>
        <h6>Tổng câu hỏi: {{$totalQues->countQues}}</h6>
        <p>Số câu đúng: {{$true}}</p>
        <p>Số câu sai: {{$false}}</p>
            <p>Số đã làm: {{$countAnswered}}</p>
        <p>Số chưa làm: {{$countNotAnswered}}</p>
        
    </main>

@endsection
