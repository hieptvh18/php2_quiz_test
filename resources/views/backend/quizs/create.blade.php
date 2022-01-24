@extends('layout.layout')

@section('page-title','Tạo quiz')
@section('main')
    <main>
        <h4 class="text-center mt-4">Tạo mới quizs</h4>

        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Tên bộ quiz</label>
                <input type="text" placeholder="Enter name" name="name" class="form-control" value="{{old('name')}}">
            </div>

            <div class="form-group">
                <label for="">Thuộc bộ môn</label>
                <select name="subject" id="">
                    <option value="" selected disabled>Chọn môn học</option>
                    @foreach ($listSubject as $item)
                        <option value="{{$item->id}}">{{$item['name']}}</option>
                        
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="">Thời gian làm bài</label>
                <input type="number" placeholder="Enter name" name="duration" class="form-control" value="{{old('duration')}}">
            </div>

            {{-- thêm các trường khác --}}

            <div class="form-group">
                <label for="">Ảnh đại diện</label>
                <input type="file" name="avatar" class="form-control">
                
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </main>
@endsection