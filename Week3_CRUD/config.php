<?php
// Konfigurasi koneksi ke database
$host     = "localhost";
$username = "root";
$password = "";
$dbname   = "mahasiswa";

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
