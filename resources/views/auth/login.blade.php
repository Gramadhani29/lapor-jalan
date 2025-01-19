<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://images.pexels.com/photos/229014/pexels-photo-229014.jpeg');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .login-card {
            max-width: 900px;
            margin: auto;
            border: none;
        }
        .left-content {
            background-color: #e8eaf6;
            color: #333;
            padding: 2rem;
            border-top-left-radius: 15px;
            border-bottom-left-radius: 15px;
        }
        .right-content {
            padding: 2rem;
        }
        .btn-primary {
            background-color: #4b69f1;
            border: none;
        }
        .btn-primary:hover {
            background-color: #3a55d3;
        }
        .form-label {
            font-weight: bold;
        }
        .signup-link {
            color: #4b69f1;
        }
        .signup-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card login-card shadow-lg d-flex flex-row">
            <!-- Left Side -->
            <div class="left-content d-flex flex-column justify-content-center align-items-center">
                <h1 class="fw-bold">Welcome Back!</h1>
                <p>Please enter login details below</p>
            </div>

            <!-- Right Side -->
            <div class="right-content w-100">
                <h3 class="text-center mb-4">Sign In</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter the password" required>
                </div>
                    <button type="submit" class="btn btn-primary w-100">Sign In</button>
                <div class="text-center mt-3">
                        <span>Don't have an account? </span>
                        <a href="{{ route('register') }}" class="signup-link">Sign Up</a>
                </div>
            </form>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
