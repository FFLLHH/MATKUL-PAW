<?php
include 'config.php';

// Mengambil data dari tabel data_mahasiswa
$sql = "SELECT * FROM data_mahasiswa";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body>
    <h2>Data Mahasiswa</h2>
    <a href="create.php">Tambah Data</a>
    <br><br>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Tahun Masuk</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Menampilkan tiap baris data
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['NIM'] . "</td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['tahun_masuk'] . "</td>";
                echo "<td>" . $row['jurusan'] . "</td>";
                echo "<td>
                        <a href='update.php?NIM=" . $row['NIM'] . "'>Edit</a> | 
                        <a href='delete.php?NIM=" . $row['NIM'] . "' onclick=\"return confirm('Yakin ingin menghapus data?')\">Delete</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
        }
        ?>
    </table>
</body>
</html>
