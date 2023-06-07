<?php
    session_start();
    include "koneksi.php";
    if (!isset($_SESSION['login'])) {
        header("location:index.php");
        exit();
    }

    $id = $_GET['id'];
    $sql_user = mysqli_query($conn, "SELECT * FROM akun_customer WHERE id=$id");
    $customer = mysqli_fetch_array($sql_user);

    $sql = mysqli_query($conn, "SELECT * FROM laporan");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Laporan - Customer</title>
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
                <?php echo $customer['username'] ?>   
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
                        <a class="nav-link" href="paket_laundry.php?id=<?php echo $customer['id'] ?>">
                            <div class="sb-nav-link-icon"><img src="assets/buy.svg" alt=""></div>
                            Paket Laundry
                        </a>
                        <a class="nav-link" href="laporanUser.php?id=<?php echo $customer['id'] ?>" style="margin-left: -5px;">
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
                    <h1 class="mt-4">LAPOR</h1>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="btn btn-primary" onclick="showPopup()">Add Report</div>
                                <!-- <a href="tambahLaporan.php" class="btn btn-primary">Add report</a> -->
                            </div>
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
    <div class="popup_tambah">
        <div class="blocker" onclick="hidePopup()"></div>
        <div class="form">
            <div class="container">
                <div class="box">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Memilih Paket Jasa</h3>
                    </div>
                    <form action="tambahLaporan_exe.php?id=<?php echo $customer['id']; ?>" method ="POST">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputEmail" type="text" placeholder="name@example.com" name="nama" value="<?php echo $customer['username'] ?>" style="pointer-events: none;"/>
                            <label for="inputEmail">Nama Lengkap</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" placeholder="Password" name="tanggal" value="<?php 
                            $tanggal = date('d/m/Y');
                            $formatTanggal = date("j F Y", strtotime($tanggal));
                            echo $formatTanggal; ?>" style="pointer-events: none;"/>
                            <label for="inputPassword">Tanggal Laporan</label>
                        </div>
                        <div class="form-floating mb-1">
                            <textarea class="form-control" type="textarea" placeholder="Password" name="laporan" cols="30" rows="20" required></textarea>
                            <label for="inputPassword">Laporan</label>
                        </div>
                        <br><br><br>
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