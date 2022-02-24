{{-- form xác nhận code đăng kí tài khoản --}}
@extends('layout.layout')
@section('page-title','Đăng kí tài khoản')
@section('main')

<div class="container">
    <h2>Nhập mã xác nhận đăng kí tài khoản</h2>
    <form action="{{route('auth.handle-confirm-register')}}" class="form" method="POST">
        @csrf
        <div class="form-group">
            <label for="">Nhập mã xác nhận</label>
            <input type="text" name="code" class="form-control">
            @error('code')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            @if (session('message'))
                <div class="text-danger">{{session('message')}}</div>
            @endif
        </div>
        <button type="submit" class="btn btn-info">Confirm</button>
    </form>
</div>
@endsection