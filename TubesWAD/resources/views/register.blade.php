<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <div class="container">
    <div class="logo">
      <img src="logo.png" alt="Logo">
    </div>
    <h1>DAFTAR DENGAN KAMI!</h1>
    <p>Informasi Anda aman bersama kami</p>
    <form id="signupForm">
      <div class="input-group">
        <input type="text" id="nama" placeholder="Masukkan nama lengkap anda" required>
        <input type="email" id="email" placeholder="Masukkan email anda" required>
        <input type="password" id="password" placeholder="Masukkan password anda" required>
        <input type="password" id="confirmPassword" placeholder="Ulangi password anda" required>
      </div>
      <button type="button" id="nextButton">Selanjutnya</button>
    </form>
    <p class="login-link">Sudah memiliki akun? <a href="#">Masuk</a></p>
  </div>
  <script src="../js/bootstrap.js"></script>
  <script src="../js/app.js"></script>
</body>
</html>
