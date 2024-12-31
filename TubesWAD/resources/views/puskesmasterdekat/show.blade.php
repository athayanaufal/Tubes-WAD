@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Puskesmas</div>

                <div class="card-body">
                    <div class="mb-3">
                        <strong>Nama Puskesmas:</strong>
                        <p>{{ $puskesmas->nama }}</p>
                    </div>

                    <div class="mb-3">
                        <strong>Alamat:</strong>
                        <p>{{ $puskesmas->alamat }}</p>
                    </div>

                    <div class="mb-3">
                        <strong>Koordinat:</strong>
                        <p>Latitude: {{ $puskesmas->latitude }}<br>Longitude: {{ $puskesmas->longitude }}</p>
                    </div>

                    <div class="mb-3">
                        <strong>Telepon:</strong>
                        <p>{{ $puskesmas->telepon ?? '-' }}</p>
                    </div>

                    <div class="mt-3">
                        <a href="{{ route('puskesmasterdekat.edit', $puskesmas->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('puskesmasterdekat.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection