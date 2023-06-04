<?php
    include "koneksi.php";
    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal'];
    $laporan = $_POST['laporan'];
    $sql = "INSERT INTO laporan (id, nama, tanggal, laporan) 
    VALUES(NULL, '$nama', '$tanggal', '$laporan')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $conn . "<br>" . mysqli_error($mysqli);
    }
        header('Location: laporanUser.php');
        exit();
?>