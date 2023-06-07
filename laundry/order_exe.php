<?php
    include "koneksi.php";

    $sql_tipe = mysqli_query($conn, "SELECT * FROM jasa");

    $id = $_GET['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tanggal = $_POST['tanggal'];
    $opsi = $_POST['opsi'];
    $berat = $_POST['berat'];
    while($tipe = mysqli_fetch_assoc($sql_tipe)){
        if($opsi == $tipe['tipe']){
            $total = $berat * $tipe['harga'];
        }
    }

    if(isset($_POST['tambah'])){
        $sql = "INSERT INTO transaksi (id, nama, alamat, tanggal_Pemesanan, tipe_paket, total, konfirmasi) 
        VALUES(NULL, '$nama', '$alamat', '$tanggal', '$opsi', '$total', 'tidak')";

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $conn . "<br>" . mysqli_error($mysqli);
        }

        header("Location: paket_laundry.php?id={$id}");
        exit();
    }
?>