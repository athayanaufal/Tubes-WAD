<!-- resources/views/janji_temu/janjiTemu.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <title>Janji Temu Dokter</title>
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
        .btn-category {
            width: 100%;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            transition: background-color 0.3s;
        }
        .btn-category:hover {
            background-color: #e2e6ea;
        }
        .search-bar {
            border-radius: 20px;
            padding: 10px;
        }
        .card-title {
            font-size: 1.5rem;
        }
        .row button{
            padding: 30px;
        }
    </style>
</head>
<body>

    @include("component.navbar")

    <div class="container">
        <h2 class="text-center">Konsul Dokter Online</h2>
        <input type="text" class="form-control mb-3 search-bar" placeholder="Mencari...">

        <h4>Kategori Medis</h4>
        <div class="row">
            <div class="col-md-4 mb-3">
                <button class="btn btn-light btn-category" onclick="window.location='{{ route('dokter.umum') }}'">
                    <i class="fas fa-user-md fa-3x"></i>
                    <h5 class="card-title">Dokter Umum</h5>
                </button>
            </div>
            <div class="col-md-4 mb-3">
                <button class="btn btn-light btn-category">
                    <i class="fas fa-baby fa-3x"></i>
                    <h5 class="card-title">Spesialis Anak</h5>
                </button>
            </div>
        </div>
    </div>
</body>
</html>