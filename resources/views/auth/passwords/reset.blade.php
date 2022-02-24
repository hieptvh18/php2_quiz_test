{{-- form tạo lại mk mới --}}

@extends('layout.layout')
@section('page-title','Quên mật khẩu')
@section('main')

<div class="container">
    <h2>Tạo lại mật khẩu mới</h2>
    <form action="{{route('auth.handle-enter-pass-new')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="">Mật khẩu mới</label>
            <input type="password" name="password_new" placeholder="*********" class="form-control">
            @error('password_new')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Nhập lại mật khẩu mới</label>
            <input type="password" name="password_confirm" placeholder="*********" class="form-control">
            @if (session('message'))
                <div class="text-danger">{{session('message')}}</div>
            @endif
        </div>
        <button class="btn btn-info" type="submit">Confirm</button>
    </form>
</div>

@endsection