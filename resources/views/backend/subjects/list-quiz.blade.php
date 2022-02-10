@extends('layout.layout-admin')
@section('page-title', 'Danh sách quiz')
@section('main')


    <main class="col-md-9">
        <div class="title mt-4 mb-3">
            @if ($myQuiz)
                <h4>Danh sách bộ quiz của {{ $quizTitle->name }}</h4>
            @endif

        </div>

        <div class="content">
            {{-- nếu exsit thì lăp --}}


            @foreach ($myQuiz as $key => $item)
                <div class="alert alert-secondary d-flex justify-content-between">
                    <div class="">
                        <span>{{ $key + 1 }}.</span>
                        <span>{{ $item->name }}</span>
                    </div>
                    <div class="">
                        <a href="{{ route('admin.quiz.result', ['id' => $item->id]) }}" class="btn btn-secondary">Quản lý</a>
                        <a href="{{ route('admin.quiz.edit', ['id' => $item->id]) }}" class="btn btn-warning">Sửa</a>
                        <a href="{{ route('admin.quiz.remove', ['id' => $item->id]) }}"
                            onclick="return confirm('Bạn chắc chắn muốn xóa quiz! Tất cả thông tin liên quan cũng sẽ bị xóa!')"
                            class=" btn btn-danger">Xóa</a>
                    </div>
                </div>
            @endforeach

        </div>
    </main>
@endsection
