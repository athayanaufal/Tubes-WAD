@extends('Layouts.app')

@section('title', 'Selamat Datang di Layanan Puskesmas')

@section('content')
<style>
    body {
        font-family: 'Segoe UI';
        background-color: #f8f9fa;
    }
    .hero {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('bg welcome.png') no-repeat center center/cover;
        color: white;
        text-align: center;
        padding: 250px 100px;
    }
    .hero h1 {
        font-size: 3rem;
    }
    .hero p {
        font-size: 1.2rem;
    }
</style>

<!-- Hero Section -->
<header class="hero mt-5">
    <h1>Selamat Datang di Layanan Puskesmas</h1>
    <p>Pelayanan Kesehatan Terbaik untuk Anda dan Keluarga</p>
    <a href="#services" class="btn btn-primary mt-4">Lihat Layanan Kami</a>
</header>

<!-- Services Section -->
<section id="services" class="container-fluid py-5">
    <div class="text-center mb-4">
        <h2>Layanan Kami</h2>
        <p>Kami menyediakan berbagai layanan kesehatan untuk masyarakat.</p>
    </div>
    <div class="row">
        <div class="col-md-4 text-center">
            <img src="virtual.png" alt="Kosultasi Virtual" class="img-fluid rounded-circle mb-3" style="width: 150px;">
            <h5>Kosultasi Virtual</h5>
            <p>Pelayanan Konsultasi Secara Virtual dengan Dokter</p>
        </div>
        <div class="col-md-4 text-center">
            <img src="calendar.png" alt="Janji Temu Dokter" class="img-fluid rounded-circle mb-3" style="width: 150px;">
            <h5>Janji Temu Dokter</h5>
            <p>Menjadwalkan Janji Temu Bersama Dokter</p>
        </div>
        <div class="col-md-4 text-center">
            <img src="obat.png" alt="Tebus Obat" class="img-fluid rounded-circle mb-1" style="width: 150px;">
            <h5>Tebus Obat</h5>
            <p>Menyediakan Tebus Obat Secara Online</p>
        </div>
        <div class="col-md-4 text-center">
            <img src="riwayat.png" alt="Akses Riwayat Medis" class="img-fluid rounded-circle mb-3" style="width: 150px;">
            <h5>Akses Riwayat Medis</h5>
            <p>Pelayanan Untuk Mengecek Riwayat Medis</p>
        </div>
        <div class="col-md-4 text-center">
            <img src="mobil.png" alt="Tracking Ambulance" class="img-fluid rounded-circle mb-3" style="width: 150px;">
            <h5>Ambulance Online</h5>
            <p>Menyediakan Layanan Tracking Ambulance</p>
        </div>
        <div class="col-md-4 text-center">
            <img src="kamar.png" alt="Pengecekan Ketersediaan Kamar" class="img-fluid rounded-circle mb-3" style="width: 150px;">
            <h5>Pengecekan Ketersediaan Kamar</h5>
            <p>Layanan Pengecekan Ketersediaan Kamar</p>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
    <p>&copy; Layanan Puskesmas</p>
</footer>
@endsection


