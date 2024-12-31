{{-- resources/views/rujukan/index.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rujukan Terdekat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        
        .search-form {
            max-width: 500px;
            margin: 0 auto 30px;
        }
        
        h1, h2 {
            color: #333;
            text-align: center;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        .button-group {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-top: 20px;
        }
        
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        
        .btn-primary {
            background-color: #4CAF50;
            color: white;
        }
        
        .btn-secondary {
            background-color: #2196F3;
            color: white;
        }
        
        .rujukan-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
        }
        
        .rujukan-card {
            background: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .rujukan-card h3 {
            margin: 0 0 10px 0;
            color: #333;
        }
        
        .rujukan-info {
            margin-bottom: 5px;
        }
        
        .distance {
            color: #2196F3;
            font-weight: bold;
        }
        
        .loading {
            text-align: center;
            padding: 20px;
            display: none;
        }
        
        .error {
            color: #f44336;
            text-align: center;
            padding: 10px;
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Rujukan Terdekat</h1>

        <div class="card search-form">
            <h2>Cari Rujukan</h2>
            <form action="{{ route('rujukan.index') }}" method="GET" id="searchForm">
                <div class="form-group">
                    <label for="latitude">Latitude:</label>
                    <input type="text" id="latitude" name="latitude" value="{{ request('latitude') }}" required>
                </div>
                
                <div class="form-group">
                    <label for="longitude">Longitude:</label>
                    <input type="text" id="longitude" name="longitude" value="{{ request('longitude') }}" required>
                </div>
                
                <div class="button-group">
                    <button type="button" class="btn btn-secondary" onclick="getLocation()">
                        Gunakan Lokasi Saya
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Cari Rujukan Terdekat
                    </button>
                </div>
            </form>
        </div>

        <div id="loading" class="loading">
            Mencari lokasi Anda...
        </div>

        <div id="error" class="error"></div>

        @if(isset($rujukan) && $rujukan->count() > 0)
            <div class="rujukan-list">
                @foreach($rujukan as $r)
                    <div class="rujukan-card">
                        <h3>{{ $r->nama }}</h3>
                        <div class="rujukan-info">
                            <strong>Alamat:</strong> {{ $r->alamat }}
                        </div>
                        <div class="rujukan-info">
                            <strong>Telepon:</strong> {{ $r->telepon ?? 'Tidak tersedia' }}
                        </div>
                        <div class="rujukan-info">
                            <strong>Jenis Layanan:</strong> {{ $r->jenis_layanan }}
                        </div>
                        @if(isset($r->distance))
                            <div class="rujukan-info">
                                <strong>Jarak:</strong> 
                                <span class="distance">{{ number_format($r->distance, 2) }} km</span>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <div class="card">
                <p style="text-align: center;">Tidak ada rujukan terdekat yang ditemukan dalam radius 10 km.</p>
            </div>
        @endif
    </div>

    <script>
        function getLocation() {
            const loading = document.getElementById('loading');
            const error = document.getElementById('error');
            
            loading.style.display = 'block';
            error.style.display = 'none';
            
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                showErrorMessage("Browser Anda tidak mendukung geolocation.");
            }
        }

        function showPosition(position) {
            document.getElementById('latitude').value = position.coords.latitude;
            document.getElementById('longitude').value = position.coords.longitude;
            document.getElementById('loading').style.display = 'none';
            
            // Automatically submit the form when location is found
            document.getElementById('searchForm').submit();
        }

        function showError(error) {
            let errorMessage;
            switch(error.code) {
                case error.PERMISSION_DENIED:
                    errorMessage = "Anda menolak permintaan geolokasi.";
                    break;
                case error.POSITION_UNAVAILABLE:
                    errorMessage = "Informasi lokasi tidak tersedia.";
                    break;
                case error.TIMEOUT:
                    errorMessage = "Waktu permintaan untuk mendapatkan lokasi habis.";
                    break;
                case error.UNKNOWN_ERROR:
                    errorMessage = "Terjadi kesalahan yang tidak diketahui.";
                    break;
            }
            showErrorMessage(errorMessage);
        }

        function showErrorMessage(message) {
            const error = document.getElementById('error');
            const loading = document.getElementById('loading');
            
            error.textContent = message;
            error.style.display = 'block';
            loading.style.display = 'none';
        }
    </script>
</body>
</html>