<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI';
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('regis bg.png') no-repeat center center/cover;
        }
        .register-container {
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
        <div class="register-container">
            <!-- Logo -->
            <div class="text-center mb-4">
                <img src="Logo Puskesmas.png" alt="Puskesmas Logo" style="width: 100px;">
            </div>
            <!-- Title -->
            <h4 class="form-title">Daftar Akun</h4>
            <p class="text-center">Lengkapi data berikut untuk membuat akun</p>
            <!-- Form -->
            <form action="/register" method="POST">
                @csrf
                 <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" maxlength="16" minlength="16"
                        placeholder="Masukkan 16 digit NIK" required pattern="\d{16}" 
                        title="NIK harus berupa 16 digit angka">
                </div>
                <div class="mb-3">
                    <label for="name" class ="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama sesuai KTP" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <div>
                        <input type="radio" id="male" name="gender" value="Laki-laki" required>
                        <label for="male">Laki-laki</label>
                        <input type="radio" id="female" name="gender" value="Perempuan" required>
                        <label for="female">Perempuan</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="dob" name="dob" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Contoh: email@gmail.com" required>
                </div>
                <div class="mb-3">                        <label for="password" class="form-label">Kata Sandi</label>
                    <input type="password" class="form-control" id="password" name="password" minlength="8" 
                        placeholder="Masukkan kata sandi" required>
                    <small class="form-text text-muted">Minimal 8 karakter, termasuk huruf besar, kecil, dan angka.</small>
                </div>
                <div class="mb-3">
                    <label for="confirm-password" class="form-label">Konfirmasi Kata Sandi</label>
                    <input type="password" class="form-control" id="confirm-password" name="confirm_password" minlength="8" 
                        placeholder="Masukkan ulang kata sandi" required>
                </div>
                <button type="submit" class="btn btn-primary">Daftar</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">
    function validateForm() {
        if (password !== confirmPassword) {
        alert("Kata sandi dan konfirmasi kata sandi tidak cocok!");
        return false;
    }
    }
    </script>
</body>
</html>
