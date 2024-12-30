<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Chat dengan Dokter</title>
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
        .chat-box {
            height: 400px;
            overflow-y: scroll;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            background-color: #f1f1f1;
            margin-bottom: 20px;
        }
        .message {
            margin-bottom: 15px;
            clear: both;
        }
        .message p {
            margin: 0;
        }
        .message-user {
            text-align: right;
        }
        .message-doctor {
            text-align: left;
        }
        .user-message {
            background-color: #007bff;
            color: white;
            display: inline-block;
            padding: 10px;
            border-radius: 10px;
            max-width: 70%;
            margin-left: auto;
        }
        .doctor-message {
            background-color: #e2e6ea;
            display: inline-block;
            padding: 10px;
            border-radius: 10px;
            max-width: 70%;
        }
        .btn-sudahi {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    @include("component.navbar")
    <div class="container">
        <h2 class="text-center">Chat dengan Dokter</h2>
        
        <div class="chat-box" id="chatBox">
            <div class="message message-user">
                <h6>Anda:</h6>
                <div class="user-message">
                    <p>Halo, saya pasien.</p>
                </div>
            </div>
        
            <div class="message message-doctor">
                <h6>Dokter:</h6>
                <div class="doctor-message">
                    <p>{{ ['Halo, ada yang bisa saya bantu?', 'Selamat datang, bagaimana kabar Anda?', 'Apa yang bisa saya bantu hari ini?'][array_rand(['Halo, ada yang bisa saya bantu?', 'Selamat datang, bagaimana kabar Anda?', 'Apa yang bisa saya bantu hari ini?'])] }}</p>
                </div>
            </div>
        </div>

        <form id="chatForm" action="#" method="POST" class="mt-3">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" id="chatInput" placeholder="Ketik pesan Anda..." required>
            </div>
            <div class="action">
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
        </form>

        <form action="{{ route('sudahi.percakapan', $konsul->id) }}" method="POST" class="btn-sudahi">
            @csrf
            <button type="submit" class="btn btn-danger">Sudahi Percakapan</button>
        </form>

    </div>

    <script>
        document.getElementById('chatForm').addEventListener('submit', function(event) {
            event.preventDefault();

            // Ngambil nilai dari input
            var chatInput = document.getElementById('chatInput');
            var message = chatInput.value;

            // Tambahkan pesan ke chat box
            var chatBox = document.getElementById('chatBox');
            var newMessage = document.createElement('div');
            newMessage.classList.add('message', 'message-user');
            newMessage.innerHTML = '<h6>Anda:</h6><div class="user-message"><p>' + message + '</p></div>';
            chatBox.appendChild(newMessage);

            // Kosongin input
            chatInput.value = '';

            // Scroll ke bawah chat box
            chatBox.scrollTop = chatBox.scrollHeight;

            // Chat buat dari dokter
            setTimeout(function() {
                var doctorMessage = document.createElement('div');
                doctorMessage.classList.add('message', 'message-doctor');
                doctorMessage.innerHTML = '<h6>Dokter:</h6><div class="doctor-message"><p>Baik</p></div>';
                chatBox.appendChild(doctorMessage);

                // Scroll ke bawah chat box
                chatBox.scrollTop = chatBox.scrollHeight;
            }, 500); // Delay 0.5 detik buat dokter
        });
    </script>
</body>
</html>
