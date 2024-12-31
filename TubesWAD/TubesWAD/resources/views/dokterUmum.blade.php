<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Daftar Dokter Umum</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .card-title {
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
    @include("component.navbar")
    <div class="container mt-4">
        <input type="text" class="form-control mb-3 search-bar" placeholder="Mencari...">
        <a href="{{ route('janji_temu.index') }}" class="btn btn-secondary mb-3">Back</a>
        <h2 class="text-center">Hasil Dokter Umum</h2>
        <div class="row">
        @foreach($dokters as $dokter)
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">{{ $dokter->nama_dokter }}</h5>
                        <p class="card-text">Spesialisasi: {{ $dokter->spesialisasi }}</p>
                        <p class="card-text">No. Telepon: {{ $dokter->no_telepon }}</p>
                        <a href="{{ route('jadwalkan', $dokter->id) }}" class="btn btn-primary">Jadwalkan</a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</body>
</html>