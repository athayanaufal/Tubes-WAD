<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Dokter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
        }
        .doctor-card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        .doctor-card img {
            max-width: 100%;
            border-bottom: 1px solid #ddd;
        }
        .doctor-card h5 {
            font-size: 1.25rem;
        }
        .availability {
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <h1 class="text-center mb-4">Cari Dokter</h1>
        <div class="mb-4">
            <input type="text" class="form-control" placeholder="Ketik nama dokter atau gunakan filter">
        </div>
        <div class="row">
            <!-- Doctor Card Template -->
            <div class="col-md-4 mb-4">
                <div class="card doctor-card">
                    <img src="https://via.placeholder.com/150" alt="Foto Dokter">
                    <div class="card-body">
                        <h5 class="card-title">Dr. Advantia Emilia</h5>
                        <p class="card-text">Psikolog</p>
                        <p class="card-text"><span class="availability">Tersedia: Hari ini</span></p>
                        <div class="d-grid gap-2">
                            <a href="#" class="btn btn-success">Konsultasi Online</a>
                            <a href="#" class="btn btn-primary">Pesan Janji Temu</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Repeat Doctor Cards -->
            <div class="col-md-4 mb-4">
                <div class="card doctor-card">
                    <img src="https://via.placeholder.com/150" alt="Foto Dokter">
                    <div class="card-body">
                        <h5 class="card-title">Dr. Agnes A. Amelia</h5>
                        <p class="card-text">Psikolog</p>
                        <p class="card-text"><span class="availability">Tersedia: Hari ini</span></p>
                        <div class="d-grid gap-2">
                            <a href="#" class="btn btn-success">Konsultasi Online</a>
                            <a href="#" class="btn btn-primary">Pesan Janji Temu</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pagination -->
            <div class="col-12 mt-4">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
