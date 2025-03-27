<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'MaBaiViet' => 'required|exists:articles,MaBaiViet',
            'MaNguoiDung' => 'required|exists:users,MaNguoiDung',
            'NoiDung' => 'required',
        ]);

        Comment::create($validated);

        return redirect()->back()->with('success', 'Bình luận đã được thêm.');
    }
    public function update(Request $request, $MaBinhLuan)
    {
        $comment = Comment::findOrFail($MaBinhLuan);

       
        // Xác thực dữ liệu
        $validated = $request->validate([
            'NoiDung' => 'required|string',
        ]);

        // Cập nhật bình luận
        $comment->update([
            'NoiDung' => $validated['NoiDung'],
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Bình luận đã được cập nhật thành công.');
    }
    public function destroy($MaBinhLuan) // Sửa $id thành $MaBinhLuan để rõ ràng
    {
        $comment = Comment::findOrFail($MaBinhLuan);
        $comment->delete();

        return redirect()->back()->with('success', 'Bình luận đã được xóa.');
    }
}