@extends('layout.layout')
@section('page-title', 'For student')
@section('main')


    <main>
        <div class="title mt-4 mb-3">
            <h4>Danh sách câu hỏi quizs / {{ $quiz->name }}</h4>

        </div>

        <div class="content-quiz bg-light mb-4">
            @if (session('teacher'))
                <a href="{{ route('admin.quiz.add-question', ['id' => $quizId]) }}" class="btn btn-secondary">Thêm bộ câu
                    hỏi +</a>
            @endif
            <div class="duration text-center mb-2">
                <div class=" text-danger">Thời gian làm bài: {{ $quiz->duration_minutes }} phút</div>
                <h6 class="mr-2">Thời gian còn lại:</h6>
                <span id="js-timeout">{{ $quiz->duration_minutes }} phút</span>
            </div>
            <form action='{{route('client.quiz.exam.post')}}' method="POST" name="exam" id="formExam">
                @csrf

                {{-- lặp toàn bộ câu hỏi, lồng bên trong là đáp án ok --}}
                @foreach ($listQues as $key => $q)
                    <div class="item  p-3 mb-3">
                        <div class="ques mb-3 alert alert-secondary">
                            {{ $key + 1 }}.{{ $q->name }} ?
                        </div>
                        @if ($q->img)
                            <div class="m-3">
                                <img src="{{ asset('uploads/' . $q->img) }}" width="100px" alt="">
                            </div>
                        @endif
                        <div class="list-answer pl-3 pr-3">
                            @foreach (getAnswer($q->id) as $key2 => $a)
                                <p>
                                    <input type="radio" id="ans{{ $key2 + 1 }}" name="answer" value="">
                                    <label for="ans{{ $key2 + 1 }}">{{ $key + 1 }}.{{ $key2 + 1 }}.
                                        {{ $a->content }};</label>
                                </p>
                            @endforeach
                        </div>
                    </div>
                @endforeach

                <button type="submit" class="btn btn-info mt-3">Gửi</button>
            </form>
        </div>
    </main>

    {{-- js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        window.onload = function() {
            const form = document.getElementById('formExam');
            
            var minute = 1;
            var sec = 60;
            setInterval(function() {
                document.getElementById("js-timeout").innerHTML = (minute-1)+' phút' + " : " + sec+' giây';
                sec--;
                if (sec == 00) {
                    minute--;
                    sec = 60;
                    if (minute == 0) {
                        form.submit();
                        alert('Kết thúc thời gian làm bài!')
                        // submit và redirect đi kết quả bài làm
                        return
                    }
                }
            }, 1000);
        }
    </script>

@endsection
