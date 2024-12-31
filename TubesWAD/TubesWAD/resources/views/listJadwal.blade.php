<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Jadwalkan Pertemuan</title>
</head>
<body>
    @include("component.navbar")
    <div class="container mt-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h2 class="text-center">Jadwalkan Pertemuan dengan {{ $dokter->nama_dokter }}</h2>
        <form action="{{ route('jadwalkan.store', ['dokter_id' => $dokter->id]) }}" method="POST">
            @csrf
            <input type="hidden" name="nip_dokter" value="{{ $dokter->nip_dokter }}">
            <div class="form-group">
                <label for="nomor_telepon">Nomor Telepon</label>
                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon_pasien" required>
            </div>
            <div class="form-group">
                <label for="waktu_janji">Waktu Janji</label>
                <input type="datetime-local" class="form-control" id="waktu_janji" name="waktu_janji" required>
            </div>
            <div class="form-group">
                <label for="catatan">Catatan</label>
                <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Jadwalkan</button>
        </form>
    </div>
</body>
</html>