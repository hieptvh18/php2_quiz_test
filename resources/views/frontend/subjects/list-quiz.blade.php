@extends('layout.layout')
@section('page-title', 'Danh sách quiz')
@section('main')


    <main>
        <div class="title mt-4 mb-3">
            @if ($myQuiz)
                <h4>Danh sách bộ quiz của {{ $quizTitle->name }}</h4>
            @endif

        </div>

        <div class="content">
            {{-- nếu exsit thì lăp --}}


            @foreach ($myQuiz as $key => $item)

                <div class="alert alert-secondary">
                    <span>{{ $key + 1 }}.</span>

                    @if (session('teacher'))

                        {{-- đến thời gian làm bài ms mở --}}
                        @if (strtotime(date('Y-m-d H:i:s')) >= strtotime($item->start_time)  && strtotime(date('Y-m-d H:i:s')) <= strtotime($item->end_time))
                            <span>{{ $item->name }} <a class="btn btn-success"
                                    href="{{ route('client.quiz.exam', ['id' => $item->id]) }}"
                                    onclick="return confirm('Bắt đầu vào làm quiz?')">Băt đầu làm</a></span>
                        @else
                            <span class="">{{ $item->name }} <span class="text-danger ml-3">Đã hết hạn làm
                                    bài!</span></span>
                        @endif

                        <a href="{{ route('admin.quiz.remove', ['id' => $item->id]) }}"
                            onclick="return confirm('Bạn chắc chắn muốn xóa quiz! Tất cả thông tin liên quan cũng sẽ bị xóa!')"
                            class=" ml-3 btn btn-danger">Xóa quiz</a>

                    @else

                        @if (strtotime(date('Y-m-d H:i:s')) >= strtotime($item->start_time)  && strtotime(date('Y-m-d H:i:s')) <= strtotime($item->end_time))
                            <span>{{ $item->name }} <a class="btn btn-success"
                                    href="{{ route('client.quiz.exam', ['id' => $item->id]) }}"
                                    onclick="return confirm('Bắt đầu vào làm quiz?')">Bắt đầu làm</a></span>

                        @else
                            <span class="">{{ $item->name }} 
                                <span class="text-danger ml-4">Đã hết hạn làm
                                    bài!
                                </span>
                            </span>
                        @endif
                    @endif
                </div>

            @endforeach

        </div>
    </main>
@endsection
