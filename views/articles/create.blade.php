@extends('layouts.app')

@section('content')
    <h2>Tạo bài viết mới</h2>
    <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="TieuDe" class="form-label">Tiêu đề</label>
            <input type="text" class="form-control" id="TieuDe" name="TieuDe" required>
        </div>

        <div class="mb-3">
            <label for="NoiDung" class="form-label">Nội dung</label>
            <textarea class="form-control" id="NoiDung" name="NoiDung" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label for="HinhAnh" class="form-label">Hình ảnh</label>
            <input type="file" class="form-control" id="HinhAnh" name="HinhAnh" accept="image/*">
        </div>

        <div class="mb-3">
            <label for="MaDanhMuc" class="form-label">Danh mục</label>
            <select class="form-select" id="MaDanhMuc" name="MaDanhMuc" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->MaDanhMuc }}">{{ $category->TenDanhMuc }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Lưu bài viết</button>
    </form>
@endsection