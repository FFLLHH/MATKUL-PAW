<?php
include 'config.php';

// Pastikan parameter NIM ada di URL
if (!isset($_GET['NIM'])) {
    header("Location: index.php");
    exit();
}

$nim = $_GET['NIM'];

// Proses update data (Update)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama        = $_POST['nama'];
    $tahun_masuk = $_POST['tahun_masuk'];
    $jurusan     = $_POST['jurusan'];
    
    $sql = "UPDATE data_mahasiswa SET 
                nama = '$nama',
                tahun_masuk = '$tahun_masuk',
                jurusan = '$jurusan'
            WHERE NIM = '$nim'";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

// Mengambil data berdasarkan NIM
$sql = "SELECT * FROM data_mahasiswa WHERE NIM = '$nim'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Data tidak ditemukan.";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Mahasiswa</title>
</head>
<body>
    <h2>Edit Data Mahasiswa</h2>
    <form method="post" action="">
        <label>NIM:</label><br>
        <input type="text" name="NIM" value="<?php echo $row['NIM']; ?>" readonly><br><br>
        
        <label>Nama:</label><br>
        <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required><br><br>
        
        <label>Tahun Masuk:</label><br>
        <input type="text" name="tahun_masuk" value="<?php echo $row['tahun_masuk']; ?>" required><br><br>
        
        <label>Jurusan:</label><br>
        <input type="text" name="jurusan" value="<?php echo $row['jurusan']; ?>" required><br><br>
        
        <input type="submit" value="Update Data">
    </form>
    <br>
    <a href="index.php">Kembali ke Data Mahasiswa</a>
</body>
</html>
