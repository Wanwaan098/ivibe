@extends('userlayouts.appp')

@section('title', $article->TieuDe)

@section('styles')
    <style>
        .card {
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        .card-title {
            color: var(--text-dark);
            font-weight: 600;
        }

        .card-text {
            color: #666;
            white-space: pre-wrap;
        }

        .btn-primary {
            background: linear-gradient(135deg, rgb(203, 61, 83), #e65b73);
            border: none;
            border-radius: 25px;
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            color: #fff;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #e65b73, #ff6b81);
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .btn-secondary {
            background: linear-gradient(135deg, rgb(91, 98, 104), #5a6268);
            border: none;
            border-radius: 25px;
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            color: #fff;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-secondary:hover {
            background: linear-gradient(135deg, #5a6268, #6c757d);
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .article-title {
            color: var(--text-dark);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .article-title:hover {
            color: var(--primary-color);
            text-decoration: underline;
        }

        .article-content {
            white-space: pre-wrap;
            color: black;
            font-size: 1.2rem;
            line-height: 1.6;
        }

        .btn i {
            vertical-align: middle;
            font-size: 1.2rem;
            margin-right: 0.1rem;
        }

        .form-control {
            border-radius: 15px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 8px rgba(255, 107, 129, 0.3);
        }

        .article-image {
            width: 100%;
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: block;
        }

        .comment-content, .comment-edit-form {
            display: block;
        }

        .comment-content.hidden, .comment-edit-form.hidden {
            display: none;
        }

        .comment-text {
            white-space: pre-wrap;
        }
    </style>
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <h2>
        <a href="{{ route('articless.index') }}" class="article-title">{{ $article->TieuDe }}</a>
    </h2>
    @if ($article->HinhAnh)
        <img src="{{ asset('storage/' . $article->HinhAnh) }}" alt="{{ $article->TieuDe }}" class="article-image">
    @endif
    <p class="article-content">{{ $article->NoiDung }}</p>
    <a href="{{ route('articless.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Trở lại danh sách</a>

    <hr>

    <h4>Thêm bình luận</h4>
    @auth
        <form action="{{ route('comments.store') }}" method="POST" id="comment-form">
            @csrf
            <input type="hidden" name="MaBaiViet" value="{{ $article->MaBaiViet }}">
            <input type="hidden" name="MaNguoiDung" value="{{ Auth::id() }}">
            <div class="mb-3">
                <textarea name="NoiDung" class="form-control" placeholder="Nhập bình luận... (Nhấn Enter để gửi, Shift + Enter để xuống dòng)" required id="comment-textarea"></textarea>
            </div>
            <button type="submit" class="btn btn-primary"><i class="bi bi-send"></i> Gửi bình luận</button>
        </form>
    @else
        <p>Vui lòng <a href="{{ route('login') }}">đăng nhập</a> để thêm bình luận.</p>
    @endauth

    <hr>

    <h4>Bình luận</h4>
    @forelse ($article->comments as $comment)
        <div class="card" id="comment-{{ $comment->MaBinhLuan }}">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <div class="comment-content">
                        <p><strong>{{ $comment->user->TenDangNhap }}:</strong> <span class="comment-text">{{ $comment->NoiDung }}</span></p>
                        <small>
                            Đăng vào: 
                            @if ($comment->created_at)
                                {{ $comment->created_at->format('d/m/Y H:i') }}
                            @else
                                Chưa xác định
                            @endif
                        </small>
                    </div>
                    <div class="comment-edit-form hidden">
                        <form action="{{ route('comments.update', $comment->MaBinhLuan) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <textarea name="NoiDung" class="form-control" placeholder="Nhập nội dung bình luận... (Shift + Enter để xuống dòng)" required>{{ $comment->NoiDung }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-save"></i> Lưu</button>
                            <button type="button" class="btn btn-secondary btn-sm cancel-edit"><i class="bi bi-x"></i> Hủy</button>
                        </form>
                    </div>
                </div>
                @auth
                    @if (Auth::id() == $comment->MaNguoiDung || Auth::user()->VaiTro == 'ADMIN')
                        <div class="dropdown">
                            <button class="btn btn-menu" type="button" id="dropdownMenuButton-{{ $comment->MaBinhLuan }}" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton-{{ $comment->MaBinhLuan }}">
                                <li><a class="dropdown-item dropdown-item-edit edit-comment" href="#" data-comment-id="{{ $comment->MaBinhLuan }}"><i class="bi bi-pencil me-2"></i>Sửa</a></li>
                                <li>
                                    <form action="{{ route('comments.destroy', $comment->MaBinhLuan) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item dropdown-item-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận này?')"><i class="bi bi-trash me-2"></i>Xóa</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endif
                @endauth
            </div>
        </div>
    @empty
        <p>Chưa có bình luận nào.</p>
    @endforelse
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const textarea = document.getElementById('comment-textarea');
            const form = document.getElementById('comment-form');
            
            if (textarea && form) {
                textarea.addEventListener('keypress', function (e) {
                    if (e.keyCode === 13 && !e.shiftKey) {
                        e.preventDefault();
                        form.submit();
                    }
                });
            }

            document.querySelectorAll('.edit-comment').forEach(button => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    const commentId = this.getAttribute('data-comment-id');
                    const commentCard = document.getElementById(`comment-${commentId}`);
                    const contentDiv = commentCard.querySelector('.comment-content');
                    const editFormDiv = commentCard.querySelector('.comment-edit-form');

                    contentDiv.classList.add('hidden');
                    editFormDiv.classList.remove('hidden');
                });
            });

            document.querySelectorAll('.cancel-edit').forEach(button => {
                button.addEventListener('click', function () {
                    const commentCard = this.closest('.card');
                    const contentDiv = commentCard.querySelector('.comment-content');
                    const editFormDiv = commentCard.querySelector('.comment-edit-form');

                    contentDiv.classList.remove('hidden');
                    editFormDiv.classList.add('hidden');
                });
            });
        });
    </script>
@endsection