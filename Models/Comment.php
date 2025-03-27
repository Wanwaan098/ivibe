<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $primaryKey = 'MaBinhLuan'; // Khai báo khóa chính
    public $incrementing = true; // Khóa chính là số tự tăng
    protected $table = 'comments'; // Tên bảng

    protected $fillable = [
        'MaBaiViet',
        'MaNguoiDung',
        'NoiDung',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class, 'MaBaiViet', 'MaBaiViet');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'MaNguoiDung', 'MaNguoiDung');
    }
}