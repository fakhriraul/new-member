<?php
require 'config.php'; // File konfigurasi untuk koneksi database

// Proses registrasi
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $role = $_POST['role'];

    if ($username && $password && $confirm_password) {
        if ($password === $confirm_password) {
            // Hash password
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            // Simpan ke database
            $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
            $stmt->bind_param('sss', $username, $hashed_password, $role);

            if ($stmt->execute()) {
                $message = 'Registrasi berhasil! Silakan <a href="login.php" class="text-primary">login</a>.';
            } else {
                $message = 'Registrasi gagal. Username mungkin sudah digunakan.';
            }
        } else {
            $message = 'Password dan konfirmasi password tidak cocok.';
        }
    } else {
        $message = 'Harap isi semua kolom.';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Perpustakaan</title>
    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #ff758c, #ff7eb3);
            color: #fff;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }
        .form-control {
            border-radius: 30px;
        }
        .btn-primary {
            border-radius: 30px;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card p-4" style="width: 100%; max-width: 400px; background-color: #fff; color: #333;">
            <h2 class="text-center mb-4">Register</h2>
            <?php if ($message): ?>
                <div class="alert <?= strpos($message, 'berhasil') !== false ? 'alert-success' : 'alert-danger'; ?> text-center">
                    <?= $message; ?>
                </div>
            <?php endif; ?>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Ulangi password" required>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Daftar Sebagai</label>
                    <select class="form-select" id="role" name="role" required>
                        <option value="peminjam">Peminjam</option>
                        <option value="petugas">Petugas</option>
                        <option value="admin">admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">Daftar</button>
            </form>
            <p class="text-center mt-3">Sudah punya akun? <a href="login.php" class="text-primary">Login di sini</a></p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
