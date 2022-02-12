@extends('layout.layout')
@section('page-title','Lịch sử làm bài')
@section('main')
    

<main>

    <!-- list examed -->
    <h4 class="mt-3 mb-3">Lịch sử làm bài</h4>
    <div class="list-examed">

        {{-- code --}}
        @foreach($testDone as $key=>$item)
            <div class="alert alert-secondary d-flex justify-content-between">
                @if (strtotime(date('Y-m-d H:i:s')) >= strtotime($item->start_time)  && strtotime(date('Y-m-d H:i:s')) <= strtotime($item->end_time))
                <a onclick="return confirm('Làm lại quiz?')" href="{{route('client.quiz.exam',['id'=>$item->id])}}">
                    {{$key+1}}. {{$item->name}}
                </a>
                @else
                <span>{{$key+1}}. {{$item->name}}</span>
                <span class="text-danger">Bài quiz đã hết hạn</span>
                @endif
                <div><i class="mr-3">{{$item->exam_date}}</i>Điểm: {{$item->score}}/10</div>
            </div>
        @endforeach

       
    </div>
</main>

@endsection
