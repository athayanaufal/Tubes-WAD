<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>List Jadwal</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            background-color: white;
        }
        h2 {
            margin-bottom: 30px;
        }
        .btn-edit {
            background-color: #ffc107;
            color: white;
        }
        .btn-delete {
            background-color: #dc3545;
            color: white;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .disabled {
            pointer-events: none;
            opacity: 0.6;
        }
    </style>
</head>
<body>
    @extends('Layouts.app')
    <div class="container">
        <h2 class="text-center">Jadwal Konsul</h2>

        <!-- Tombol Back -->
        <a href="{{ route('dokter.umum') }}" class="btn btn-secondary mb-3">Back</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NIP Dokter</th>
                    <th>Nama Pasien</th>
                    <th>Waktu Janji</th>
                    <th>Catatan</th>
                    <th>Status</th>
                    <th>Edit jadwal</th>
                    <th>Chat</th>
                    <th>Hapus History</th>
                </tr>
            </thead>
            <tbody>
            @forelse($konsuls as $konsul)
                <tr>
                    <td>{{ $konsul->nip_dokter }}</td>
                    <td>{{ $konsul->nama_pasien }}</td>
                    <td>{{ $konsul->waktu_janji }}</td>
                    <td>{{ $konsul->catatan }}</td>
                    <td>{{ $konsul->status ? 'done' : 'on going' }}</td>
                    <td>
                        @if(!$konsul->status)
                            <a href="{{ route('janji_temu.edit', $konsul->id) }}" class="btn btn-warning">Edit</a>
                        @else
                            <a href="#" class="btn btn-warning disabled">Edit</a>
                        @endif
                    </td>
                    <td>
                        @if($konsul->status)
                            <a href="{{ route('chat', $konsul->id) }}" class="btn btn-primary disabled">Chat</a>
                        @else
                            <a href="{{ route('chat', $konsul->id) }}" class="btn btn-primary">Chat</a>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('janji_temu.destroy', $konsul->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            @if($konsul->status)
                                <button type="submit" class="btn btn-danger">Delete</button>
                            @else
                                <button type="submit" class="btn btn-danger disabled">Delete</button>
                            @endif
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Tidak ada janji temu yang ditemukan.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
