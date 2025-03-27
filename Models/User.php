<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'MaNguoiDung'; // Chỉ định khóa chính

    protected $fillable = [
        'TenDangNhap',
        'MatKhau',
        'Email',
        'VaiTro',
        'Diemtichluy',
    ];

    protected $hidden = [
        'MatKhau', // Ẩn mật khẩu khi trả JSON
        'remember_token',
    ];

    // Sử dụng đúng trường MatKhau làm mật khẩu
    public function getAuthPassword()
    {
        return $this->MatKhau;
    }
}
