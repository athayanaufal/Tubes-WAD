<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pemilihan Kamar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Pemilihan Kamar</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h2>Informasi Semua Kamar</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Kamar</th>
                        <th>Tipe Kamar</th>
                        <th>Kapasitas</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($semuaKamar as $kamar)
                        <tr id="kamar-{{ $kamar->id }}" @if($kamar->status !== 'tersedia') class="table-secondary" @endif>
                            <td>{{ $kamar->nama_kamar }}</td>
                            <td>{{ $kamar->tipe_kamar }}</td>
                            <td>{{ $kamar->kapasitas }}</td>
                            <td>
                                <span class="badge {{ $kamar->status === 'tersedia' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $kamar->status }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h2>Pilih Kamar untuk Pasien</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('pilihkamar.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="pasien_id" class="form-label">Pasien</label>
                    <select name="pasien_id" id="pasien_id" class="form-select" required>
                        <option value="" disabled selected>Pilih Pasien</option>
                        @foreach ($pasiens as $pasien)
                            <option value="{{ $pasien->id }}">{{ $pasien->nama_pasien }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="kamar_id" class="form-label">Kamar Tersedia</label>
                    <select name="kamar_id" id="kamar_id" class="form-select" required>
                        <option value="" disabled selected>Pilih Kamar</option>
                        @foreach ($kamarTersedia as $kamar)
                            <option value="{{ $kamar->id }}">
                                {{ $kamar->nama_kamar }} (Kapasitas: {{ $kamar->kapasitas }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
