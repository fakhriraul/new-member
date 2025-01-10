<?php
session_start();

// Cek apakah admin sudah login
if (!isset($_SESSION['logged_in']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Perpustakaan</title>
    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #1f4037, #99f2c8);
            font-family: 'Arial', sans-serif;
            color: #fff;
        }
        .sidebar {
            background-color: #2c3e50;
            height: 100vh;
            padding: 20px;
            border-radius: 15px;
            color: #fff;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            margin: 10px 0;
            display: block;
        }
        .sidebar a:hover {
            background-color: #34495e;
            padding: 10px;
            border-radius: 10px;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
        }
        .btn-primary {
            border-radius: 30px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar">
                <h3 class="text-center">Admin Panel</h3>
                <hr>
                <a href="dashboard_admin.php">Dashboard</a>
                <a href="manage_users.php">Kelola Pengguna</a>
                <a href="manage_books.php">Kelola Buku</a>
                <a href="manage_loans.php">Kelola Peminjaman</a>
                <a href="logout.php" class="text-danger">Logout</a>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10">
                <div class="container py-4">
                    <h2 class="mb-4">Selamat Datang, Admin!</h2>
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="card text-dark bg-light">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Total Pengguna</h5>
                                    <p class="card-text display-5">120</p>
                                    <a href="manage_users.php" class="btn btn-primary">Kelola</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-dark bg-light">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Total Buku</h5>
                                    <p class="card-text display-5">450</p>
                                    <a href="manage_books.php" class="btn btn-primary">Kelola</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-dark bg-light">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Peminjaman Aktif</h5>
                                    <p class="card-text display-5">80</p>
                                    <a href="manage_loans.php" class="btn btn-primary">Kelola</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5">
                        <h4>Aktivitas Terbaru</h4>
                        <table class="table table-dark table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Aktivitas</th>
                                    <th>Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Pengguna "John" menambahkan buku baru</td>
                                    <td>2025-01-10 10:45</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Peminjaman buku "Pemrograman PHP"</td>
                                    <td>2025-01-09 15:20</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Peminjam "Sarah" memperbarui profil</td>
                                    <td>2025-01-08 12:30</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
