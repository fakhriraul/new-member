<?php
// Memulai sesi
session_start();

// Periksa apakah pengguna sudah login dan perannya adalah peminjam
if (!isset($_SESSION['logged_in']) || $_SESSION['role'] !== 'peminjam') {
    header('Location: login.php');
    exit();
}

// Contoh data (ganti dengan data dari database)
$username = $_SESSION['username'] ?? 'Peminjam';
$totalPinjaman = 5; // Contoh jumlah pinjaman
$dendaAktif = 0; // Contoh jumlah denda
$bukuFavorit = ['Atomic Habits', 'The Power of Habit', 'Rich Dad Poor Dad']; // Contoh buku favorit
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Peminjam - Perpustakaan</title>
    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card:hover {
            transform: scale(1.02);
            transition: all 0.3s ease-in-out;
        }
        .welcome-text {
            font-size: 1.2rem;
            color: #555;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Perpustakaan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="borrowed_books.php">Buku Dipinjam</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="fines.php">Denda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="text-center mb-4">
            <h1 class="fw-bold">Selamat Datang, <?= htmlspecialchars($username); ?>!</h1>
            <p class="welcome-text">Dashboard peminjam perpustakaan Anda</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fa-solid fa-book fa-3x text-primary mb-3"></i>
                        <h5 class="card-title">Total Pinjaman</h5>
                        <p class="card-text fs-4 fw-bold"><?= $totalPinjaman; ?></p>
                        <a href="borrowed_books.php" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fa-solid fa-wallet fa-3x text-danger mb-3"></i>
                        <h5 class="card-title">Denda Aktif</h5>
                        <p class="card-text fs-4 fw-bold">Rp <?= number_format($dendaAktif, 0, ',', '.'); ?></p>
                        <a href="fines.php" class="btn btn-danger">Bayar Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fa-solid fa-star fa-3x text-warning mb-3"></i>
                        <h5 class="card-title">Buku Favorit</h5>
                        <ul class="list-unstyled">
                            <?php foreach ($bukuFavorit as $buku): ?>
                                <li class="text-muted"><?= htmlspecialchars($buku); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <a href="favorite_books.php" class="btn btn-warning">Lihat Semua</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-primary text-white text-center py-3 mt-5">
        <p class="mb-0">© 2025 Perpustakaan | Dashboard Peminjam</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
