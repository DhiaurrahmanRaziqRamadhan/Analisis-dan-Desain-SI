<?php
    include "koneksi.php";

    $asal = $_GET['id'];
    $tanggal = $_POST['tanggal'];
    $laporan = $_POST['laporan'];

    $sql = "INSERT INTO laporan (id, tanggal, laporan, id_customer) 
    VALUES(NULL, '$tanggal', '$laporan', '$asal')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $conn . "<br>" . mysqli_error($mysqli);
    }
        header("Location: laporanUser.php?id={$asal}");
        exit();
?>