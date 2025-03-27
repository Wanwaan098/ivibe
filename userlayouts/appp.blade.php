<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - TẠP CHÍ IVIBE</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #f291a3;
            --secondary-color: #f8f9fa;
            --text-light:rgb(232, 235, 238);
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
            background: black;
            color: var(--text-light);
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
    </style>
    @yield('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('articless.index') }}">TẠP CHÍ IVIBE</a>
            <div class="ms-auto d-flex gap-2">
                <a href="{{ route('login') }}" class="btn btn-light">Logout</a>
            </div>
        </div>
    </nav>

    <div class="main-content">
        <div class="container-custom">
            @yield('content')
        </div>
    </div>

    <footer>
        <p>© 2025 Trang Tin Tức. Tất cả các quyền được bảo vệ.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>