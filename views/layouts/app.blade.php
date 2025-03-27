<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TẠP CHÍ IVIBE</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #f291a3;
            --secondary-color: #f8f9fa;
            --text-dark: rgb(40, 43, 47);
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
            background: linear-gradient(to right,rgb(248, 138, 159), #dfe6e9);
            padding: 1rem 2rem;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
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

        .btn {
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-light {
            background: #fff;
            color: var(--text-dark);
        }

        .btn-light:hover {
            background: var(--primary-color);
            color: #fff;
            transform: translateY(-2px);
        }

        .btn-dark {
            background: var(--text-dark);
            color: #fff;
        }

        .btn-dark:hover {
            background: #000;
            transform: translateY(-2px);
        }

        .btn-warning {
            background: #ffa94d;
            color: #fff;
        }

        .btn-warning:hover {
            background: #ff922b;
            transform: translateY(-2px);
        }

        .main-content {
            flex: 1 0 auto;
            padding-top: 80px;
        }

        .container-custom {
            width: 90%;
            max-width: 1400px;
            margin: 2rem auto;
            display: flex;
            gap: 2rem;
        }

        .sidebar {
            background: #fff;
            padding: 2rem;
            border-radius: 15px;
            width: 25%;
            box-shadow: var(--shadow);
            position: sticky;
            top: 100px;
            height: fit-content;
            font-size: 1.1rem; /* Tăng cỡ chữ cho sidebar */
            line-height: 1.6; /* Tăng khoảng cách dòng */
        }

        .sidebar h4 {
            color: var(--text-dark);
            font-weight: 600;
            margin-bottom: 1.5rem;
            position: relative;
            font-size: 1.5rem; /* Tăng cỡ chữ cho tiêu đề sidebar */
        }

        .sidebar h4::after {
            content: '';
            position: absolute;
            width: 50px;
            height: 3px;
            background: var(--primary-color);
            bottom: -5px;
            left: 0;
        }

        .list-group-item {
            border: none;
            padding: 0.75rem 0;
        }

        .list-group-item a {
            color: var(--text-dark);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .list-group-item a:hover {
            color: var(--primary-color);
            padding-left: 10px;
        }

        .content {
            background: #fff;
            padding: 2rem;
            border-radius: 15px;
            width: 75%;
            box-shadow: var(--shadow);
            font-size: 1.1rem; /* Tăng cỡ chữ cho nội dung chính */
            line-height: 1.6; /* Tăng khoảng cách dòng */
        }

        /* Tăng cỡ chữ cho các phần tử con bên trong .content */
        .content h2 {
            font-size: 2rem; /* Tăng cỡ chữ cho tiêu đề h2 */
            margin-bottom: 1.5rem;
        }

        .content h4 {
            font-size: 1.5rem; /* Tăng cỡ chữ cho tiêu đề h4 */
            margin-bottom: 1rem;
        }

        .content p {
            margin-bottom: 1rem;
        }

        .content ul, .content ol {
            margin-bottom: 1rem;
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
                flex-direction: column;
                width: 95%;
            }
            .sidebar, .content {
                width: 100%;
            }
            .sidebar, .content {
                font-size: 1rem; /* Giảm cỡ chữ trên màn hình nhỏ */
            }
            .sidebar h4, .content h2 {
                font-size: 1.3rem; /* Giảm cỡ chữ tiêu đề trên màn hình nhỏ */
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">TẠP CHÍ IVIBE</a>
            <div class="ms-auto d-flex gap-2">
                @auth
                    <a href="{{ route('profile') }}" class="btn btn-light">Profile</a>
                    <a href="{{ route('logout') }}" class="btn btn-dark">Logout</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-light">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-warning">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="main-content">
        <div class="container-custom">
            <div class="sidebar">
                <h4>Menu</h4>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('articles.index') }}">Quản lý bài viết</a>
                    </li>
                </ul>
            </div>
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>

    <footer>
        <p>© 2025 Trang Tin Tức. Tất cả các quyền được bảo vệ.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>