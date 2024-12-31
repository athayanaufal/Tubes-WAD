<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Akun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI';
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('login bg.png') no-repeat center center/cover;
        }
        .login-container {
            max-width: 500px;
            margin: auto;
            margin-top: 50px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        .form-title {
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-primary {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <!-- Logo -->
            <div class="text-center mb-4">
                <img src="Logo Puskesmas.png" alt="Puskesmas Logo" style="width: 100px;">
            </div>
            <!-- Title -->
            <h4 class="form-title">Login Akun</h4>
            <p class="text-center">Masukkan nama dan kata sandi untuk masuk</p>
            
            <!-- Display error messages -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <input type="password" class="form-control" id="password" name="password" minlength="8" 
                        placeholder="Masukkan kata sandi" required>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('dashboard') }}">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </a>
                        </div>
                    </form>
            
            <!-- Additional Links -->
            <div class="text-center mt-3">
                <p>Belum punya akun? <a href="/register">Daftar</a></p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
