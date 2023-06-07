<?php
    include "koneksi.php";

    $id = $_GET['id'];
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
        header("Location: laporanUser.php?id={$id}");
        exit();
?>