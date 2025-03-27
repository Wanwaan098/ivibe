<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>
    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles -->
    <style>
        body {
            background: linear-gradient(to right, #f291a3, rgb(230, 232, 235));
            font-family: 'Nunito', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-card h4 {
            text-align: center;
            color: #333;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        .form-control {
            border-radius: 30px;
            padding: 0.75rem;
            font-size: 1rem;
            margin-bottom: 1.5rem;
            border: 1px solid #ddd;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            border-color: #2575fc;
            box-shadow: 0 0 8px rgba(37, 117, 252, 0.5);
        }

        .btn-primary {
            border-radius: 30px;
            padding: 0.75rem;
            font-size: 1rem;
            background-color: #f291a3;
            border: none;
            width: 100%;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color:rgb(221, 89, 113);
            transform: translateY(-2px);
        }

        .link-text {
            text-align: center;
            margin-top: 1rem;
        }

        .link-text a {
            color:rgb(221, 89, 113);
            text-decoration: none;
            font-weight: 600;
        }

        .link-text a:hover {
            text-decoration: underline;
        }

        .alert-danger {
            margin-bottom: 1rem;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
            border-radius: 5px;
            padding: 0.75rem;
        }
    </style>
</head>

<body>
    <div class="login-card">
        <h4>WELCOME IVIBE !</h4>
        <form action="{{ route('login.action') }}" method="POST">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="form-group">
                <input name="Email" type="email" class="form-control" placeholder="Enter Email Address..." required>
            </div>

            <div class="form-group">
                <input name="MatKhau" type="password" class="form-control" placeholder="Password" required>
            </div>

            <div class="form-group d-flex justify-content-between">
                <div class="custom-control custom-checkbox">
                    <input name="remember" type="checkbox" class="custom-control-input" id="customCheck">
                    <label class="custom-control-label" for="customCheck">Remember Me</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>

            <div class="link-text">
                <a href="{{ route('register') }}">Create an Account!</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
