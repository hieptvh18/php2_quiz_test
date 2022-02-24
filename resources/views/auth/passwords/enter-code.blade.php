{{-- form nhập mã code từ mail quên password --}}

@extends('layout.layout')
@section('page-title','Quên mật khẩu')
@section('main')

<div class="container">
    <h2>Nhập mã xác nhận từ email của bạn</h2>
    <form action="{{route('auth.handle-enter-code-forgot')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="">Mã code</label>
            <input type="text" name="code" placeholder="Nhập mã code" class="form-control">
            @if (session('message'))
                <div class="text-danger">{{session('message')}}</div> 
            @endif
        </div>
        <button class="btn btn-info" type="submit">Submit</button>
    </form>
</div>
@endsection