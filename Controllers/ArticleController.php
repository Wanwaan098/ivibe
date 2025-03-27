<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'TieuDe' => 'required|max:255',
            'NoiDung' => 'required',
            'MaDanhMuc' => 'required|exists:categories,MaDanhMuc',
            'HinhAnh' => 'nullable|image|max:2048' // Ảnh là tùy chọn, định dạng ảnh, tối đa 2MB
        ]);

        // Xử lý upload ảnh
        $hinhAnhPath = null;
        if ($request->hasFile('HinhAnh')) {
            $hinhAnhPath = $request->file('HinhAnh')->store('images', 'public'); // Lưu ảnh vào storage/public/images
        }

        Article::create([
            'TieuDe' => $request->TieuDe,
            'NoiDung' => $request->NoiDung,
            'HinhAnh' => $hinhAnhPath, // Lưu đường dẫn ảnh
            'MaTacGia' => Auth::id(),
            'MaDanhMuc' => $request->MaDanhMuc
        ]);

        return redirect()->route('articles.index')->with('success', 'Bài viết đã được tạo thành công.');
    }

    public function edit($MaBaiViet)
    {
        $article = Article::where('MaBaiViet', $MaBaiViet)->firstOrFail();
        $categories = Category::all();
        return view('articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, $MaBaiViet)
    {
        $article = Article::where('MaBaiViet', $MaBaiViet)->firstOrFail();

        $request->validate([
            'TieuDe' => 'required|max:255',
            'NoiDung' => 'required',
            'MaDanhMuc' => 'required|exists:categories,MaDanhMuc',
            'HinhAnh' => 'nullable|image|max:2048' // Ảnh là tùy chọn, tối đa 2MB
        ]);

        // Xử lý upload ảnh mới (nếu có)
        $hinhAnhPath = $article->HinhAnh; // Giữ ảnh cũ nếu không upload ảnh mới
        if ($request->hasFile('HinhAnh')) {
            // Xóa ảnh cũ nếu tồn tại
            if ($hinhAnhPath && Storage::disk('public')->exists($hinhAnhPath)) {
                Storage::disk('public')->delete($hinhAnhPath);
            }
            $hinhAnhPath = $request->file('HinhAnh')->store('images', 'public');
        }

        $article->update([
            'TieuDe' => $request->TieuDe,
            'NoiDung' => $request->NoiDung,
            'HinhAnh' => $hinhAnhPath, // Cập nhật đường dẫn ảnh
            'MaDanhMuc' => $request->MaDanhMuc,
            'NgayCapNhat' => now(),
        ]);

        return redirect()->route('articles.index')->with('success', 'Bài viết đã được cập nhật thành công.');
    }

    public function show($MaBaiViet)
    {
        $article = Article::where('MaBaiViet', $MaBaiViet)->firstOrFail();
        return view('articles.show', compact('article'));
    }

    public function destroy($MaBaiViet)
    {
        $article = Article::where('MaBaiViet', $MaBaiViet)->firstOrFail();

        // Xóa ảnh nếu tồn tại
        if ($article->HinhAnh && Storage::disk('public')->exists($article->HinhAnh)) {
            Storage::disk('public')->delete($article->HinhAnh);
        }

        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Bài viết đã được xóa thành công.');
    }
}