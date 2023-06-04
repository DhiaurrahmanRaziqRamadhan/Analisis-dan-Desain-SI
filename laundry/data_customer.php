<?php
    session_start();
    include "koneksi.php";
    if (!isset($_SESSION['login'])) {
        header("location:index.php");
        exit();
    }

    $sql = mysqli_query($conn, "SELECT * FROM customer");
    $id = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Data Customer - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/custome_styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="icon" href="img/white 2.png">
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-light" style="background-color: #131212a3;">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="data_customer.php" style="color: white;"><center>****</center></a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="sb-nav-link-icon">
                <img src="assets/profil.svg" alt="">   
                admin   
                <a href="logout.php"><img src="assets/logout.svg" alt=""></a>
            </div>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <center><img src="img/white 2.png" alt="logo" style="width: 120px; margin-top: -20px;"></center>
                        <center><h5><b>Laundry Express</b></h5></center>
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="data_customer.php">
                            <div class="sb-nav-link-icon"><img src="assets/customer.svg" alt=""></div>
                            Data Customer
                        </a>
                        <a class="nav-link" href="data_harga.php">
                            <div class="sb-nav-link-icon"><img src="assets/Wallet_fill.svg" alt=""></i></div>
                            Data Harga
                        </a>
                        <a class="nav-link" href="transaksi.php">
                            <div class="sb-nav-link-icon"><img src="assets/Frame 135.svg" alt=""></i></div>
                            Transaksi
                        </a>
                        <a class="nav-link" href="laporan.php" style="margin-left: -5px">
                            <div class="sb-nav-link-icon"><img src="assets/report.svg" alt=""></i></div>
                            Laporan
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">DATA CUSTOMER</h1>
                    <p style="margin-left: 1000px; margin-top: -40px">Admin/adliif</p><br>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="mb-4">
                                <a href="tambahCustomer.php" class="btn btn-primary">Add customer</a>
                            </div>
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Tanggal Pemesanan</th>
                                        <th>Tipe Paket</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php while($result = mysqli_fetch_assoc($sql)) { ?>
                                    <tr>
                                        <td><?php echo $id++ ?></td>
                                        <td><?= $result['nama']; ?></td>
                                        <td><?= $result['alamat']; ?></td>
                                        <td><?= $result['tanggal_pemesanan']; ?></td>
                                        <td><?= $result['tipe_paket']; ?></td>
                                        <td><center><a href="updateCustomer.php?update=<?php echo $result['id']; ?>" class="btn btn-primary" type="button">Ubah Data</a></center></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; LaundryExpress 2023</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>