<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Kamar</title>
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
                        <a class="nav-link active" href="#">Pilih Kamar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container mt-5 pt-4">
        <h2 class="text-center my-4">Pilih Kamar</h2>

        <!-- Form Pilih Pasien -->
        <div class="card mb-5">
            <div class="card-body">
                <h5 class="card-title">Formulir Pemilihan Kamar</h5>
                <form action="{{ route('pemilihan_kamar.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="pasien_id" class="form-label">Pilih Pasien</label>
                        <select name="pasien_id" id="pasien_id" class="form-select">
                            @foreach ($pasiens as $pasien)
                                <option value="{{ $pasien->id }}">{{ $pasien->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="kamar_id" class="form-label">Pilih Kamar</label>
                        <select name="kamar_id" id="kamar_id" class="form-select">
                            @foreach ($kamar as $room)
                                <option value="{{ $room->id }}" {{ $room->status == 'terisi' ? 'disabled' : '' }}>
                                    {{ $room->nama_kamar }} ({{ $room->status }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Pilihan</button>
                </form>
            </div>
        </div>

        <!-- Daftar Kamar -->
        <div class="row">
            @foreach($kamar as $room)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $room->nama_kamar }}</h5>
                        <p class="card-text">
                            Kapasitas: {{ $room->kapasitas }} orang<br>
                            Status: {{ $room->status }}
                        </p>
                        <form action="{{ route('pemilihan_kamar.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="kamar_id" value="{{ $room->id }}">
                            <button type="submit" class="btn btn-primary" {{ $room->status == 'terisi' ? 'disabled' : '' }}>
                                Pilih Kamar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; Layanan Puskesmas</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
