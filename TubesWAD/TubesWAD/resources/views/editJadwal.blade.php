<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Jadwal</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    @include("component.navbar")
    <div class="container mt-4">
        <h2 class="text-center">Edit Jadwal Pertemuan</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <a href="{{ route('jadwal.janji_temu.index') }}" class="btn btn-secondary mb-3">Back</a>

        <form action="{{ route('janji_temu.update', $konsul->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nip_dokter">NIP Dokter</label>
                <input type="text" class="form-control" id="nip_dokter" name="nip_dokter" value="{{ $konsul->nip_dokter }}" readonly>
            </div>
            <div class="form-group">
                <label for="nama_pasien">Nama Pasien</label>
                <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="{{ $konsul->nama_pasien }}" readonly>
            </div>
            <div class="form-group">
                <label for="waktu_janji">Waktu Janji</label>
                <input type="datetime-local" class="form-control" id="waktu_janji" name="waktu_janji" value="{{ \Carbon\Carbon::parse($konsul->waktu_janji)->format('Y-m-d\TH:i') }}" required>
            </div>
            <div class="form-group">
                <label for="catatan">Catatan</label>
                <textarea class="form-control" id="catatan" name="catatan" rows="3">{{ $konsul->catatan }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Jadwal</button>
        </form>
    </div>
</body>
</html>
