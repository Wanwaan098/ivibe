<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'MaBaiViet'; // Khóa chính
    public $incrementing = true; // Khóa chính là số tự tăng
    protected $table = 'articles'; // Tên bảng

    protected $fillable = [
        'TieuDe',
        'NoiDung',
        'HinhAnh',
        'MaTacGia',
        'MaDanhMuc',
        'LuotXem',
        'DuyetBaiViet',
        'NgayTao',
        'NgayCapNhat',
    ];

    // Nếu bạn muốn tự động sử dụng 'NgayCapNhat' khi cập nhật
    protected $dates = ['NgayTao', 'NgayCapNhat'];

    // Kết nối với danh mục
    public function category()
    {
        return $this->belongsTo(Category::class, 'MaDanhMuc', 'MaDanhMuc');
    }

    // Kết nối với tác giả
    public function author()
    {
        return $this->belongsTo(User::class, 'MaTacGia', 'MaNguoiDung');
    }

    // Kết nối với bình luận
    public function comments()
    {
        return $this->hasMany(Comment::class, 'MaBaiViet', 'MaBaiViet');
    }
}