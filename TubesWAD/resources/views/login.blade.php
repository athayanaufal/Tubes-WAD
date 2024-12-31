<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Login</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="pasien">Pasien</option>
                    <option value="dokter">Dokter</option>
                    <option value="perawat">Perawat</option>
                    <option value="pegawai">Pegawai</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>