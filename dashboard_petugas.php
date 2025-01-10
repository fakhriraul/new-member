<?php
// Memulai sesi
session_start();

// Periksa apakah petugas sudah login
if (!isset($_SESSION['logged_in']) || $_SESSION['role'] !== 'petugas') {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Petugas - Perpustakaan</title>
    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link Font Awesome untuk Icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card:hover {
            transform: scale(1.03);
            transition: all 0.3s ease-in-out;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
                        <a class="nav-link" href="manage_books.php">Kelola Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="manage_users.php">Kelola Anggota</a>
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
            <h1 class="fw-bold">Selamat Datang, Petugas</h1>
            <p class="text-muted">Dashboard pengelolaan perpustakaan</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card text-center border-0 shadow-sm">
                    <div class="card-body">
                        <i class="fa-solid fa-book fa-3x text-primary mb-3"></i>
                        <h5 class="card-title">Jumlah Buku</h5>
                        <p class="card-text fs-4 fw-bold">150</p>
                        <a href="manage_books.php" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center border-0 shadow-sm">
                    <div class="card-body">
                        <i class="fa-solid fa-users fa-3x text-success mb-3"></i>
                        <h5 class="card-title">Jumlah Anggota</h5>
                        <p class="card-text fs-4 fw-bold">80</p>
                        <a href="manage_users.php" class="btn btn-success">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center border-0 shadow-sm">
                    <div class="card-body">
                        <i class="fa-solid fa-handshake fa-3x text-warning mb-3"></i>
                        <h5 class="card-title">Peminjaman Aktif</h5>
                        <p class="card-text fs-4 fw-bold">25</p>
                        <a href="manage_loans.php" class="btn btn-warning">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p class="mb-0">© 2025 Perpustakaan | Dashboard Petugas</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
