<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->TieuDe }} - TẠP CHÍ IVIBE</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #f291a3;
            --secondary-color: #f8f9fa;
            --text-dark: #2c3e50;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            background: linear-gradient(135deg, #f291a3, #dfe6e9);
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-attachment: fixed;
        }

        .navbar {
            background: linear-gradient(to right,rgb(250, 142, 162), #dfe6e9);
            padding: 1rem 2rem;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: var(--shadow);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .navbar-brand:hover {
            color: #fff;
            opacity: 0.9;
        }

        .btn-light {
            background: #fff;
            color: var(--text-dark);
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-light:hover {
            background: var(--primary-color);
            color: #fff;
            transform: translateY(-2px);
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

        .btn-menu {
            background: transparent;
            border: none;
            color: #666;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        .btn-menu:hover {
            color: var(--primary-color);
        }

        .dropdown-item-edit {
            color: #17a2b8;
        }

        .dropdown-item-edit:hover {
            background-color: #e9ecef;
            color: #138496;
        }

        .dropdown-item-delete {
            color: #dc3545;
        }

        .dropdown-item-delete:hover {
            background-color: #e9ecef;
            color: #c82333;
        }

        .main-content {
            flex: 1 0 auto;
            padding-top: 80px;
        }

        .container-custom {
            width: 80%;
            max-width: 1400px;
            margin: 2rem auto;
            background: #fff;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: var(--shadow);
        }

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

        footer {
            background: linear-gradient(to right, #2c3e50, #4b6584);
            color: #fff;
            padding: 2rem;
            text-align: center;
            flex-shrink: 0;
            width: 100%;
        }

        footer p {
            margin: 0;
            font-size: 0.9rem;
            opacity: 0.9;
        }

        @media (max-width: 768px) {
            .container-custom {
                width: 95%;
            }
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

        .comment-content, .comment-edit-form {
            display: block;
        }

        .comment-content.hidden, .comment-edit-form.hidden {
            display: none;
        }

        .comment-text {
            white-space: pre-wrap;
        }

        /* Thêm style cho hình ảnh bài viết */
        .article-image {
            width: 100%; /* Đặt width 100% để vừa khớp với khung trắng */
    max-width: 100%; /* Đảm bảo không vượt quá khung */
    height: auto; /* Giữ tỷ lệ hình ảnh */
    border-radius: 5px;
    margin-bottom: 1.5rem;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    display: block; /* Đảm bảo hình ảnh không bị lệch */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('articless.index') }}">TẠP CHÍ IVIBE</a>
            <div class="ms-auto d-flex gap-2">
                <a href="{{ route('login') }}" class="btn btn-light">Đăng xuất</a>
            </div>
        </div>
    </nav>

    <div class="main-content">
        <div class="container-custom">
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
            <!-- Hiển thị hình ảnh nếu có -->
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
        </div>
    </div>

    <footer>
        <p>© 2025 Trang Tin Tức. Tất cả các quyền được bảo vệ.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

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
</body>
</html>