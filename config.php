<?php
$host = 'localhost';
$user = 'root'; // Ganti sesuai dengan username database Anda
$password = ''; // Ganti sesuai dengan password database Anda
$database = 'perpustakaan';

$conn = new mysqli($host, $user, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die('Koneksi gagal: ' . $conn->connect_error);
}
?>
