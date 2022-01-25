@extends('layout.layout')

@section('page-title', 'Tạo quiz')
@section('main')
    <main>
        <h4 class="text-center mt-4 mb-4">Tạo mới Môn học</h4>
        <a href="{{route('admin.dashboard')}}" class="btn btn-info mb-3 mt-3">Danh sách</a>
        @if (session('msg'))
            <div class="alert alert-success">{{ session('msg') }}</div>
        @endif
        @if (session('fail'))
            <div class="alert alert-danger">{{ session('fail') }}</div>
        @endif
        <div class="content d-flex justify-content-center">
            <form action="" method="POST" class="col-md-6" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Tên bộ môn</label>
                    <input type="text" placeholder="Enter name" name="name" class="form-control" value="{{ old('name') }}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label for="">Ảnh đại diện</label>
                    <input type="file" name="avatar" class="form-control">
                    @error('avatar')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <input type="submit" class="btn btn-primary" value="Thêm">
            </form>
        </div>
    </main>
@endsection