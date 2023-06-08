<?php
     session_start();
    include "koneksi.php";
    if (!isset($_SESSION['admin'])) {
        header("location:index.php");
        exit();
    }

    $sql = mysqli_query($conn, "SELECT * FROM laporan");
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
    <title>Laporan - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="icon" href="img/white 2.png">
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-light">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="data_customer.php" style="color: white;"></a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="sb-nav-link-icon"> 
                admin   
                <a href="logout.php" class="ms-3"><img src="assets/logout.svg" alt=""></a>
            </div>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav" id="sidenavAccordion" style="background-color: #2A3042;">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <center><img src="img/white 2.png" alt="logo" style="width: 120px; margin-top: -20px;"></center>
                        <center><h5 class="text-white"><b>Laundry Express</b></h5></center>
                        <div class="sb-sidenav-menu-heading text-white">Menu</div>
                        <a class="nav-link text-white" href="data_customer.php">
                            <div class="sb-nav-link-icon"><img src="assets/customer.svg" alt=""></div>
                            Data Customer
                        </a>
                        <a class="nav-link text-white" href="data_harga.php">
                            <div class="sb-nav-link-icon"><img src="assets/Wallet_fill.svg" alt=""></i></div>
                            Data Harga
                        </a>
                        <a class="nav-link text-white" href="transaksi.php">
                            <div class="sb-nav-link-icon"><img src="assets/Frame 135.svg" alt=""></i></div>
                            Transaksi
                        </a>
                        <a class="nav-link text-white" href="laporan.php" style="margin-left: -5px">
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
                    <h1 class="mt-4">LAPORAN</h1>
                    <div class="card mb-4">
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Tanggal Laporan</th>
                                        <th>Laporan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php while($result = mysqli_fetch_assoc($sql)) { ?>
                                    <tr>
                                        <td><?php echo $id++ ?></td>
                                        <td><?= $result['nama']; ?></td>
                                        <td><?= $result['tanggal']; ?></td>
                                        <td><?= $result['laporan']; ?></td>
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
