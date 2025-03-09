<?php
include 'config.php';

// Proses tambah data (Create)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim         = $_POST['NIM'];
    $nama        = $_POST['nama'];
    $tahun_masuk = $_POST['tahun_masuk'];
    $jurusan     = $_POST['jurusan'];
    
    $sql = "INSERT INTO data_mahasiswa (NIM, nama, tahun_masuk, jurusan) 
            VALUES ('$nim', '$nama', '$tahun_masuk', '$jurusan')";
    
    if ($conn->query($sql) === TRUE) {
        // Setelah berhasil tambah data, redirect ke index.php
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Mahasiswa</title>
</head>
<body>
    <h2>Tambah Data Mahasiswa</h2>
    <form method="post" action="">
        <label>NIM:</label><br>
        <input type="text" name="NIM" placeholder="Masukkan NIM" required><br><br>
        
        <label>Nama:</label><br>
        <input type="text" name="nama" placeholder="Masukkan Nama" required><br><br>
        
        <label>Tahun Masuk:</label><br>
        <input type="text" name="tahun_masuk" placeholder="Masukkan Tahun Masuk" required><br><br>
        
        <label>Jurusan:</label><br>
        <input type="text" name="jurusan" placeholder="Masukkan Jurusan" required><br><br>
        
        <input type="submit" value="Tambah Data">
    </form>
    <br>
    <a href="index.php">Kembali ke Data Mahasiswa</a>
</body>
</html>
