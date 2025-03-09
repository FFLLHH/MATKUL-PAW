<?php
include 'config.php';

if (isset($_GET['NIM'])) {
    $nim = $_GET['NIM'];
    $sql = "DELETE FROM data_mahasiswa WHERE NIM = '$nim'";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    header("Location: index.php");
    exit();
}
?>
