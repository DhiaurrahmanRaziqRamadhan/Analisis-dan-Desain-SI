<?php
    include "koneksi.php";
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tanggal = $_POST['tanggal'];
    $opsi = $_POST['opsi'];
    $sql = "INSERT INTO customer (id, nama, alamat, tanggal_pemesanan, tipe_paket) 
    VALUES(NULL, '$nama', '$alamat', '$tanggal', '$opsi')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $conn . "<br>" . mysqli_error($mysqli);
    }

        header('Location: paket_laundry.php');
        exit();
?>