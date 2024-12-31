@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Rujukan Terdekat</h5>
            <a href="{{ route('dashboard') }}" 
             class="btn btn-secondary position-absolute top-0 start-0" style="margin-top:0rem; margin-left: -6rem;">Kembali</a>

            <a href="{{ route('rujukanterdekat.create') }}" class="btn btn-primary">Tambah Rujukan</a>
        </div>
        
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('rujukanterdekat.index') }}" method="GET" class="mb-4">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Latitude</label>
                            <input type="number" step="any" name="latitude" class="form-control" value="{{ $latitude ?? '' }}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Longitude</label>
                            <input type="number" step="any" name="longitude" class="form-control" value="{{ $longitude ?? '' }}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary mt-4">Cari Terdekat</button>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Jenis Layanan</th>
                            <th>Koordinat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rujukan as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->telepon ?? '-' }}</td>
                            <td>{{ $item->jenis_layanan }}</td>
                            <td>{{ $item->latitude }}, {{ $item->longitude }}</td>
                            <td>{{ isset($item->distance) ? number_format($item->distance, 2) : '-' }}</td>
                            <td>
                                <a href="{{ route('rujukanterdekat.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('rujukanterdekat.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('rujukanterdekat.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection