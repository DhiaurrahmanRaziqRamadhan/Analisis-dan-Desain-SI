<?php
    include "koneksi.php";

    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $member = $_POST['member'];

    $sql = "INSERT INTO customer (id, nama, alamat, nohp, member) 
    VALUES(NULL, '$nama', '$alamat', '$nohp', '$member')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $conn . "<br>" . mysqli_error($mysqli);
    }
        header('Location: data_customer.php');
        exit();
?>