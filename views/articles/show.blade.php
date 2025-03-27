@extends('layouts.app')

@section('content')
    <style>
        .article-image {
            width: 100%; /* Đặt width 100% để vừa khớp với khung trắng */
            max-width: 100%; /* Đảm bảo không vượt quá khung */
            height: auto; /* Giữ tỷ lệ hình ảnh */
            border-radius: 5px;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: block; /* Đảm bảo hình ảnh không bị lệch */
        }

        /* Style để giữ định dạng xuống dòng cho nội dung bài viết */
        .article-content {
            white-space: pre-wrap; /* Giữ các ký tự xuống dòng và khoảng trắng */
            font-size: 1.1rem; /* Tùy chỉnh kích thước chữ nếu cần */
            line-height: 1.6; /* Khoảng cách giữa các dòng */
            color: #333; /* Màu chữ */
        }
    </style>

    <div class="container">
        <h2>{{ $article->TieuDe }}</h2>
        
        @if ($article->HinhAnh)
            <img src="{{ asset('storage/' . $article->HinhAnh) }}" 
                 alt="{{ $article->TieuDe }}" 
                 class="article-image">
        @else
            <p><i>Không có hình ảnh</i></p>
        @endif

        <!-- Hiển thị nội dung bài viết với các đoạn văn cách dòng -->
        <div class="article-content">
            {!! nl2br(e($article->NoiDung)) !!}
        </div>

        {{-- Danh sách bình luận --}}
        <h4>Bình luận</h4>
        @forelse ($article->comments as $comment)
            <div class="card mb-3">
                <div class="card-body">
                    <p><strong>{{ $comment->user->name }}:</strong> {{ $comment->NoiDung }}</p>
                    <small>
                        Đăng vào: 
                        @if ($comment->created_at)
                            {{ $comment->created_at->format('d/m/Y H:i') }}
                        @else
                            Chưa xác định
                        @endif
                    </small>

                    @if (Auth::id() === $comment->MaNguoiDung)
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    @endif
                </div>
            </div>
        @empty
            <p>Chưa có bình luận nào.</p>
        @endforelse
    </div>
@endsection