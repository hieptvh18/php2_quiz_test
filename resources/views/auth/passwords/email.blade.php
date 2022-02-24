{{-- form tạo lại mk mới --}}
@extends('layout.layout')
@section('page-title','Quên mật khẩu')
@section('main')
<div class="container">
    <h2>Quên mật khẩu </h2>
    <form action="{{route('auth.forgot-pass-handle')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="">Nhập email bạn đã đăng kí</label>
            <input type="email" name="email" placeholder="a@gmail.com" class="form-control">
            @if (session('message'))
                <div class="text-danger">{{session('message')}}</div> 
            @endif
        </div>
      
        <button class="btn btn-info" type="submit">Confirm</button>
    </form>
</div>
@endsection