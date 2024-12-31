<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Medis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI';
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Layanan Puskesmas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Riwayat Medis</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container mt-5 pt-4">
        <h2 class="text-center my-4">Riwayat Medis Pasien</h2>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Diagnosa</th>
                    <th>Tanggal Pemeriksaan</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($riwayatMedis as $key => $riwayat)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $riwayat->pasien->nama }}</td>
                    <td>{{ $riwayat->diagnosa }}</td>
                    <td>{{ $riwayat->tanggal_pemeriksaan }}</td>
                    <td>{{ $riwayat->tindakan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; Layanan Puskesmas</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
