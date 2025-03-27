@extends('layouts.app')

@section('content')
    <h2>Chỉnh sửa bài viết</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form method="POST" action="{{ route('articles.update', $article->MaBaiViet) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="TieuDe" class="form-label">Tiêu đề</label>
            <input type="text" class="form-control" id="TieuDe" name="TieuDe" value="{{ $article->TieuDe }}" required>
        </div>

        <div class="mb-3">
            <label for="NoiDung" class="form-label">Nội dung</label>
            <textarea class="form-control" id="NoiDung" name="NoiDung" rows="5" required>{{ $article->NoiDung }}</textarea>
        </div>

        <div class="mb-3">
            <label for="HinhAnh" class="form-label">Hình ảnh</label>
            <input type="file" class="form-control" id="HinhAnh" name="HinhAnh" accept="image/*">
            @if ($article->HinhAnh)
                <div class="mt-2">
                    <p>Ảnh hiện tại:</p>
                    <img src="{{ asset('storage/' . $article->HinhAnh) }}" alt="{{ $article->TieuDe }}" style="max-width: 300px; height: auto;">
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="MaDanhMuc" class="form-label">Danh mục</label>
            <select class="form-select" id="MaDanhMuc" name="MaDanhMuc" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->MaDanhMuc }}" {{ $category->MaDanhMuc == $article->MaDanhMuc ? 'selected' : '' }}>
                        {{ $category->TenDanhMuc }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật bài viết</button>
    </form>
@endsection