@extends('layout.layout-exam')
@section('page-title', 'For student')
@section('main')


    <main>
        <div class="title mt-4 mb-3">
            <h4>Danh sách câu hỏi quizs / {{ $quiz->name }}</h4>

        </div>

        <div class="content-quiz bg-light mb-4">
         
            <div class="duration text-center mb-2">
                <div class=" text-danger">Thời gian làm bài: {{ $quiz->duration_minutes }} phút</div>
                <h6 class="mr-2">Thời gian còn lại:</h6>
                <span id="js-timeout">{{ $quiz->duration_minutes }} phút</span>
            </div>
            <form action="/join/exam/post" method="POST" id="formExam">
                @csrf
                <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                <input type="hidden" name="start_time" value="{{ $start_time }}">

                {{-- lặp toàn bộ câu hỏi, lồng bên trong là đáp án ok --}}
                @foreach ($listQues as $key => $q)

                    {{-- gán name của từng câu hỏi --}}
                    <input type="hidden" name="questions_id{{ $key + 1 }}" value="{{ $q->id }}">

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
                                    <input type="radio" id="ans{{ $key + 1 }}_{{ $key2 + 1 }}"
                                        name="answers{{ $key + 1 }}" value="{{ $a->id }}">
                                    <label
                                        for="ans{{ $key + 1 }}_{{ $key2 + 1 }}">{{ $key + 1 }}.{{ $key2 + 1 }}.
                                        {{ $a->content }};
                                    </label>
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

            var minute = {{ $quiz->duration_minutes }};
            var sec = 60;
            setInterval(function() {
                document.getElementById("js-timeout").innerHTML = (minute - 1) + ' phút' + " : " + sec +
                    ' giây';
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
        // nếu đóng cửa sổ thì submit
        // window.addEventListener("beforeunload", function(e) {
        //     var confirmationMessage = "Kết thúc bài kiểm tra!";

        //     (e || window.event).returnValue = confirmationMessage; //Gecko + IE
        //     return confirmationMessage;     
        // });
    </script>

@endsection
