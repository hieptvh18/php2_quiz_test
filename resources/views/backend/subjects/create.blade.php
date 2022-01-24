@extends('layout.layout')

@section('page-title','Tạo quiz')
@section('main')
    <main>
        <h4 class="text-center mt-4">Tạo mới Môn học</h4>

        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Tên bộ môn</label>
                <input type="text" placeholder="Enter name" name="name" class="form-control" value="{{old('name')}}">
            </div>

            <div class="form-group">
                <label for="">Ảnh đại diện</label>
                <input type="file" name="avatar" class="form-control">
                
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </main>
@endsection