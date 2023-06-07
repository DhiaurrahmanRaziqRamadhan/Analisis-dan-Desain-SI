<?php 
    require "koneksi.php";

    $id = $_GET['id'];
    $sql = mysqli_query($conn, "SELECT * FROM transaksi WHERE id=$id");

    $data = mysqli_fetch_array($sql);
    $nama = $data['nama'];
    $tanggal = $data['tanggal_Pemesanan'];
    $total = $data['total'];
    
    $query = mysqli_query($conn, "UPDATE transaksi SET 
                                    id = $id,
                                    nama = '$nama',
                                    tanggal_Pemesanan = '$tanggal',
                                    total = '$total',
                                    konfirmasi = 'iya'
                                    WHERE id=$id");

    header('Location: transaksi.php');
    exit();
?>