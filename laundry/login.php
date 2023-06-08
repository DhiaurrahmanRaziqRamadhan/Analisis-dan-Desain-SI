<?php
    session_start();
    include "koneksi.php";

    $email = $_POST['email'];
    $password = $_POST['pass'];

    // Mengecek kondisi jika user adalah admin
    $sql_admin = mysqli_query($conn, "SELECT * FROM akun_admin WHERE email='$email' AND pass='$password'");
    $cek_admin = mysqli_num_rows($sql_admin);

    if ($cek_admin > 0) {
        session_destroy();
        session_start();
        $_SESSION['admin'] = true;
        header('Location: data_customer.php');
        exit();
    } else {
        // Mengecek kondisi jika user adalah bukan admin
        $sql_user = mysqli_query($conn, "SELECT * FROM akun_customer WHERE email='$email' AND pass='$password'");
        $cek_user = mysqli_num_rows($sql_user);
        
        if ($cek_user > 0) {
            session_destroy();
            session_start();
            $row = mysqli_fetch_assoc($sql_user);
            $id = $row['id'];
            $_SESSION['customer'] = true;
            header("Location: paket_laundry.php?id={$id}");
            exit();
        } else {
            header('Location: index.php');
            exit();
        }
    }
?>