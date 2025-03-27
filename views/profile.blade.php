@extends('layouts.app')

@section('content')
    <h2>Thông tin cá nhân</h2>
    <p><strong>Tên đăng nhập:</strong> {{ Auth::user()->TenDangNhap }}</p>
    <p><strong>Email:</strong> {{ Auth::user()->Email }}</p>
    <p><strong>Vai trò:</strong> {{ Auth::user()->VaiTro }}</p>
    <p><strong>Điểm tích lũy:</strong> {{ Auth::user()->Diemtichluy }}</p>
@endsection
