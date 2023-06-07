<?php
    session_start();
    include "koneksi.php";
    if (!isset($_SESSION['login'])) {
        header("location:index.php");
        exit();
    }

    $sql = mysqli_query($conn, "SELECT * FROM jasa");
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
    <title>Data Harga - Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/custom_styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/native.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="icon" href="img/white 2.png">
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-light" style="background-color: #131212a3;">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="data_customer.php" style="color: white;"></a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="sb-nav-link-icon">
                <img src="assets/profil.svg" alt="">   
                admin   
                <a href="logout.php" class="ms-3"><img src="assets/logout.svg" alt=""></a>
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
                    <div style="display: flex; justify-content: space-between;">
                        <h1 class="mt-4">DATA CUSTOMER</h1>
                        <p class="mt-4">Admin/adliif</p>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div  class="mb-4">
                                <div class="btn btn-primary m-1" style="margin-left: 10px !important;" onclick="showPopup()">Add Service</div>
                                <a href="updateJasa.php" class="btn btn-primary m-1">Edit Service</a><br><br>
                            </div>
                            <div class="container">
                                <div class="row row-cols-1 row-cols-md-3 g-4">
                                <?php while($result = mysqli_fetch_assoc($sql)) { ?>
                                    <div class="col">
                                        <div class="card">
                                            <img src="img/<?= $result['foto']; ?>" class="card-img" alt="..." >
                                            <div class="card-img-overlay">
                                                <a href="hapusJasa_exe.php?delete=<?php echo $result['id']; ?>" onclick="return confirm('Melanjutkan untuk menghapus data?');" type="button">
                                                    <img src="assets/Subtract.svg" alt="" style="margin-left: 265px; margin-top: -60px;">
                                                </a>
                                                <h4 class="card-title" style="margin-top: -15px;"><?= $result['tipe']; ?></h4>
                                                <div class="sb-nav-link-icon">
                                                    <img src="assets/Ticket.svg" alt="">   
                                                    Rp.<?= $result['harga']; ?>   
                                                    <img src="assets/Time-Circle.svg" alt=""> 
                                                    <?= $result['waktu']; ?> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                </div><br><br>
                            </div>
                        </div>
                    </div>
                </div><br><br>
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
    <div class="popup_tambah">
        <div class="blocker" onclick="hidePopup()"></div>
        <div class="form">
            <div class="container">
                <div class="box">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Add Service</h3>
                    </div>
                    <form action="tambahJasa_exe.php" method ="POST">
                        <label for="inputEmail">Foto Layanan</label><br>
                        <input class="form-control" type="file" placeholder="Foto" name="foto" required>
                        <div class="form-floating mb-3 mt-3">
                            <input class="form-control" id="inputEmail" type="text" placeholder="Nama layanan" name="nama" required />
                            <label for="inputEmail">Nama Layanan</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" placeholder="Harga" name="harga" required />
                            <label for="inputPassword">Harga</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Lama Pengerjaan" name="waktu" required></textarea>
                            <label for="inputPassword">Lama Pengerjaan</label>
                        </div><br><br>
                        <a href="" class="btn btn-danger">Kembali</a>
                        <button type="submit" class="btn btn-primary" style="margin-left: 460px" name="tambah">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const popup_tambah = document.querySelector(".popup_tambah");

        function showPopup() {
            popup_tambah.classList.add('open');
        }

        function hidePopup() {
            popup_tambah.classList.remove('open');
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>