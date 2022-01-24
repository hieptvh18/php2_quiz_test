@extends('layout.layout')
@section('page-title', 'Quản trị')
@section('main')
    <main>
        <div class="hello">
            <h4 class="text-center mt-3">Welcome thầy {{session('teacher')->name}} đẹp troai đến với trang quản trị Quiz test</h4>
            <h5 class="text-center text-primary m-4"><i class="fa fa-list mr-2" aria-hidden="true"></i>
                 Danh sách bộ môn </h5>
        </div>
        <div class="admin-filter">

        </div>
        <div class="content">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên môn học</th>
                        <th>Ảnh đại diện</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>

            </table>
        </div>
    </main>
@endsection
