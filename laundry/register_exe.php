<?php
    include "koneksi.php";

    $email = $_POST['email'];
    $username = $_POST['username'];
    $alamat = $_POST['alamat'];
    $noHandphone = $_POST['noHandphone'];
    $pass = $_POST['pass'];

    $sql = "INSERT INTO akun_customer (id, email, username, alamat, noHandphone, pass) 
    VALUES(NULL, '$email', '$username', '$alamat', '$noHandphone', '$pass')";
    
    $sql_customer = "INSERT INTO customer (id, nama, alamat, nohp, member)
    VALUES(NULL, '$username', '$alamat', '$noHandphone', 'tidak')";

    if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql_customer)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $conn . "<br>" . mysqli_error($mysqli);
    }
        header('Location: index.php');
        exit();
?>