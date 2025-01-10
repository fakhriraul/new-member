<?php
session_start();

// Hapus semua sesi
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout - Perpustakaan</title>
    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
            color: #fff;
            font-family: Arial, sans-serif;
        }
        .logout-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card {
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            color: #fff;
        }
        .btn-primary {
            border-radius: 30px;
            background-color: #4caf50;
            border: none;
        }
        .btn-primary:hover {
            background-color: #45a049;
        }
        .btn-secondary {
            border-radius: 30px;
        }
    </style>
</head>
<body>
    <div class="container logout-container">
        <div class="card p-4 text-center" style="max-width: 400px;">
            <h2 class="mb-3">Anda telah logout</h2>
            <p class="mb-4">Terima kasih telah menggunakan layanan perpustakaan kami. Sampai jumpa kembali!</p>
            <a href="login.php" class="btn btn-primary w-100 mb-2">Login Lagi</a>
            <a href="index.php" class="btn btn-secondary w-100">Kembali ke Halaman Utama</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
