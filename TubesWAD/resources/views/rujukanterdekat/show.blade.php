@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Detail Rujukan</h5>
            <div>
                <a href="{{ route('rujukanterdekat.edit', $rujukan->id) }}" class="btn btn-warning">Edit</a>
                <a href="{{ route('rujukanterdekat.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
        
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%">Nama Rujukan</th>
                            <td>{{ $rujukan->nama }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $rujukan->alamat }}</td>
                        </tr>
                        <tr>
                            <th>Telepon</th>
                            <td>{{ $rujukan->telepon ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Layanan</th>
                            <td>{{ $rujukan->jenis_layanan }}</td>
                        </tr>
                        <tr>
                            <th>Koordinat</th>
                            <td>
                                Latitude: {{ $rujukan->latitude }}<br>
                                Longitude: {{ $rujukan->longitude }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <form action="{{ route('rujukanterdekat.destroy', $rujukan->id) }}" method="POST" class="mt-3">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                    Hapus Rujukan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection