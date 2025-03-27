<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách bài viết - TẠP CHÍ IVIBE</title>
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
            background: linear-gradient(to right, rgb(250, 142, 162), #dfe6e9);
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

        .main-content {
            flex: 1 0 auto;
            padding-top: 80px;
            font-size: 1.2rem;
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
            color: black;
            font-size: 1.2rem;
        }

        .btn-primary {
            background: linear-gradient(135deg,rgb(71, 63, 64),rgb(38, 36, 36));
            border: none;
            border-radius: 25px;
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            color: #fff;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg,rgb(184, 84, 100),rgb(124, 82, 88));
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
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

        .btn i {
            vertical-align: middle;
            font-size: 1.2rem;
            margin-right: 0.5rem;
        }

        /* Thêm style cho hình ảnh bài viết */
        .article-image {
            max-width: 250px; /* Tăng kích thước hình ảnh từ 150px lên 250px */
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Sử dụng Flexbox để bố trí hình ảnh bên trái, nội dung bên phải */
        .card-body {
            display: flex;
            align-items: center;
            gap: 1.5rem; /* Khoảng cách giữa hình ảnh và nội dung */
        }

        .article-content {
            flex: 1; /* Nội dung chiếm phần còn lại của không gian */
        }

        /* Responsive: trên màn hình nhỏ, hình ảnh và nội dung xếp chồng */
        @media (max-width: 576px) {
            .card-body {
                flex-direction: column;
                align-items: flex-start;
            }

            .article-image {
                max-width: 100%; /* Hình ảnh chiếm toàn bộ chiều rộng trên màn hình nhỏ */
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">TẠP CHÍ IVIBE</a>
            <div class="ms-auto d-flex gap-2">
                <a href="{{ route('login') }}" class="btn btn-light">Đăng xuất</a>
            </div>
        </div>
    </nav>

    <div class="main-content">
        <div class="container-custom">
            <h2>Danh sách bài viết</h2>
            @forelse($articles as $article)
                <div class="card">
                    <div class="card-body">
                        <!-- Hình ảnh bên trái -->
                        @if ($article->HinhAnh)
                            <img src="{{ asset('storage/' . $article->HinhAnh) }}" alt="{{ $article->TieuDe }}" class="article-image">
                        @endif
                        <!-- Nội dung bên phải -->
                        <div class="article-content">
                            <h5 class="card-title">{{ $article->TieuDe }}</h5>
                            <p class="card-text">{{ Str::limit($article->NoiDung, 450) }}</p>
                            <a href="{{ route('articless.show', $article->MaBaiViet) }}" class="btn btn-primary"><i class="bi bi-eye"></i> Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            @empty
                <p>Chưa có bài viết nào.</p>
            @endforelse
        </div>
    </div>

    <footer>
        <p>© 2025 Trang Tin Tức. Tất cả các quyền được bảo vệ.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>