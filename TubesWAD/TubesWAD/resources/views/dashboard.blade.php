@extends('Layouts.app')

@push('styles')
    <!-- Include FontAwesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Additional custom styles -->
    <style>
        body, .container-fluid {
            height: 100%;
            margin: 0;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 240px;
            transition: all 0.3s ease;
        }

        .sidebar .nav-item:hover {
            background-color: #495057;
        }

        .hover-effect:hover {
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }

        .card {
            cursor: pointer;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .card-text {
            font-size: 1rem;
            color: #6c757d;
        }

        .container-fluid {
            padding-left: 0;
            margin-left: 240px; /* To make space for the fixed sidebar */
            height: calc(100% - 60px); /* Ensure content height doesn't overlap with footer */
        }

        /* Main Content Area */
        .col-md-9, .col-lg-10 {
            padding-right: 2rem;
        }

        /* Footer Styling */
        footer {
            position: relative;
            bottom: 0;
            width: 100%;
        }

        /* Adjustments for layout */
        .main-content {
            padding: 30px 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Ensure title spans full width and is well centered */
        .main-content h1 {
            background: linear-gradient(45deg, #007bff, #6610f2);
            color: white;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        @media (max-width: 768px) {
            .container-fluid {
                margin-left: 0;
                padding-left: 0;
            }

            .sidebar {
                position: static;
                width: 100%;
                height: auto;
                padding: 1rem;
            }

            .sidebar .nav-item {
                margin-bottom: 1rem;
            }

            .container-fluid {
                margin-top: 20px; /* Adjust container if needed */
            }
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar bg-dark text-white p-4">
                <h4 class="text-center mb-4">Fitur</h4>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a class="nav-link text-white" href="{{ route('ambulance') }}">
                            <i class="fas fa-ambulance"></i> <span>Ambulans</span>
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link text-white" href="{{ route('janji_temu.index') }}">
                            <i class="fas fa-calendar-check"></i> <span>Jadwal</span>
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link text-white" href="#">
                            <i class="fas fa-cogs"></i> <span>Pengaturan</span>
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link text-white" href="#">
                            <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 main-content">
                <h1 class="text-center">Selamat Datang di Layanan Puskesmas!</h1>

                <div class="row justify-content-center">
                    <!-- Ambulans Card -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card shadow-lg border-0 rounded-lg hover-effect">
                            <div class="card-body text-center">
                                <h5 class="card-title text-warning">Ambulans</h5>
                                <p class="card-text">Kelola armada ambulans yang tersedia dan pastikan kesiapan layanan darurat.</p>
                                <a href="{{ route('ambulance') }}" class="btn btn-warning btn-lg">Lihat Ambulans</a>
                            </div>
                        </div>
                    </div>

                    <!-- Jadwal Card -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card shadow-lg border-0 rounded-lg hover-effect">
                            <div class="card-body text-center">
                                <h5 class="card-title text-info">Jadwal</h5>
                                <p class="card-text">Periksa jadwal pelayanan puskesmas hari ini untuk memastikan pelayanan berjalan lancar.</p>
                                <a href="{{ route('janji_temu.index') }}" class="btn btn-info btn-lg">Janji Temu</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; Layanan Puskesmas</p>
    </footer>
@endsection
