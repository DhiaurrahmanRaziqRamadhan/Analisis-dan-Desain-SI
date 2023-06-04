<?php
    include "koneksi.php";
    $foto = $_POST['foto'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $waktu = $_POST['waktu'];
    $sql = "INSERT INTO jasa (id, foto, tipe, harga, waktu) 
    VALUES(NULL, '$foto', '$nama', '$harga', '$waktu')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $conn . "<br>" . mysqli_error($mysqli);
    }
        header('Location: data_harga.php');
        exit();
?>