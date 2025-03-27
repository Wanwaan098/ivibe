@extends('layouts.app')

@section('content')
    <h2>Chào mừng đến với trang Dashboard</h2>
    <p>Xin chào, {{ Auth::user()->TenDangNhap }}! Đây là trang quản lý của bạn.</p>
    <p>Bạn có thể quản lý các bài viết của mình từ menu bên trái.
    </p>
@endsection
