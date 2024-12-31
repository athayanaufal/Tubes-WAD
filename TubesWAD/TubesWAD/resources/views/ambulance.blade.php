@extends('Layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4 text-center text-primary">Tracking Ambulans</h1>

        <!-- Tabel Tracking Ambulans -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>#</th>
                        <th>Nama Pasien</th>
                        <th>Ambulans</th>
                        <th>Status</th>
                        <th>Waktu Pemesanan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if($ambulances->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center">No data available</td>
                        </tr>
                    @else
                        @foreach($ambulances as $ambulance)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <!-- Use 'nama_pasien' instead of 'name' -->
                                <td>{{ $ambulance->pasien->nama_pasien }}</td>
                                <!-- Use 'kode_mobil' instead of 'Nama' -->
                                <td>{{ $ambulance->kode_mobil }}</td>
                                <td>
                                    <span class="badge 
                                        @if($ambulance->status == 'On the Way') bg-success
                                        @elseif($ambulance->status == 'Waiting') bg-warning
                                        @else bg-danger
                                        @endif">
                                        {{ $ambulance->status }}
                                    </span>
                                </td>
                                <td>{{ $ambulance->created_at->format('d M Y, H:i') }}</td>
                                <td>
                                    <!-- Add your action buttons here -->
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
