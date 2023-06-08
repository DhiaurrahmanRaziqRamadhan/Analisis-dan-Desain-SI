<?php
    session_start();
    include "koneksi.php";
    if (!isset($_SESSION['admin'])) {
        header("location:index.php");
        exit();
    }

    $sql = mysqli_query($conn, "SELECT * FROM customer");

    if(isset($_POST['edit'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $nohp = $_POST['nohp'];
        $member = $_POST['member'];

        $query = "UPDATE customer SET
                  nama='$nama',
                  alamat='$alamat',
                  nohp='$nohp',
                  member='$member' WHERE id='$id'";

        if (mysqli_query($conn, $query)) {
            echo "Record updated successfully";
            header('Location: data_customer.php');
            exit;
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
            }

    $no = 1;
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
    <link href="css/custom_styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/native.css">
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
                    <div style="display: flex; justify-content: space-between;">
                        <h1 class="mt-4">DATA CUSTOMER</h1>
                    </div>
                    <br>
                    <div class="card mb-4">
                        <div class="card-body">
                            <!-- tombol menuju add customer -->
                            <div class="mb-4">
                                <div class="btn btn-primary rounded-pill mb-4" onclick="showPopupTambah()">
                                <div class="d-flex">
                                    <img class="me-1" src="assets/add_customer.svg">
                                    <div>Add customer</div>
                                </div>
                            </div>
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>No Handphone</th>
                                        <th>Member</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php while($result = mysqli_fetch_assoc($sql)) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $result['nama']; ?></td>
                                        <td><?= $result['alamat']; ?></td>
                                        <td><?= $result['nohp']; ?></td>
                                        <td><?= $result['member']; ?></td>
                                        <!-- tombol menuju edit customer -->
                                        <td><center><button
                                        class="btn btn-primary rounded-pill" type="button" >
                                        <div class="d-flex">
                                            <img class="me-1" src="assets/edit_data.svg">
                                            <div onclick="showPopupEdit()"
                                            data-id="<?= $result['id']; ?>"
                                            data-nama="<?= $result['nama']; ?>"
                                            data-alamat="<?= $result['alamat']; ?>"
                                            data-nohp="<?= $result['nohp']; ?>"
                                            data-member="<?= $result['member']; ?>">Ubah Data</div>
                                        </div>
                                        </button></center></td>
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

    <!-- popup tambah customer -->
    <div class="popup_tambah">
        <div class="blocker" onclick="hidePopupTambah()"></div>
        <div class="form">
            <div class="container">
                <div class="box">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Add Customer</h3>
                    </div>
                    <form action="tambahCustomer_exe.php" method ="POST">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputEmail" type="text" placeholder="name@example.com" name="nama" required />
                            <label for="inputEmail">Nama Lengkap</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Password" name="alamat" required></textarea>
                            <label for="inputPassword">Alamat</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" placeholder="Password" name="nohp" value="(+62) " required />
                            <label for="inputPassword">No Handphone</label>
                        </div>
                        <div class="mb-2 row">
                            <div class="col-sm-15">
                                <select class="form-select" aria-label="Default select example" name="member" required>
                                    <option selected>Member</option>
                                    <option value="tidak">Tidak</option>
                                    <option value="iya">Iya</option>
                                </select>
                            </div>
                        </div><br><br><br>
                        <a href="" class="btn btn-danger rounded-pill" style="margin-left: 30px;">Kembali</a>
                        <button type="submit" onclick="return alert('Success Melakukan Perubahan');" class="btn btn-primary rounded-pill" style="margin-left: 460px; margin-top: -60px;" name="tambah">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- popup edit customer -->
    <div class="popup_edit">
        <div class="blocker" onclick="hidePopupEdit()"></div>
        <div class="form">
            <div class="container">
                <div class="box">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Edit Customer</h3>
                    </div>
                    <form action="" method ="POST">
                        <div class="form-floating mb-3">
                            <input type="hidden" id="id" name="id">
                            <input class="form-control" id="nama" type="text" placeholder="nama" name="nama" required />
                            <label for="nama">Nama Lengkap</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="alamat" placeholder="alamat" name="alamat" required></textarea>
                            <label for="alamat">Alamat</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="nohp" type="text" placeholder="nohp" name="nohp" required />
                            <label for="nohp">No Handphone</label>
                        </div>
                        <div class="mb-2 row">
                            <div class="col-sm-15">
                                <select class="form-select" id="member" aria-label="Default select example" name="member" required>
                                    <option selected>Member</option>
                                    <option value="tidak">Tidak</option>
                                    <option value="iya">Iya</option>
                                </select>
                            </div>
                        </div><br><br><br>
                        <a href="" class="btn btn-danger rounded-pill">Kembali</a>
                        <button onclick="return alert('Success Melakukan Perubahan');" type="submit" class="btn btn-primary rounded-pill" style="margin-left: 460px" name="edit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const popup_tambah = document.querySelector(".popup_tambah");
        const popup_edit = document.querySelector(".popup_edit");
        const popup_notifikasi =document.querySelector(".popup_notifikasi");

        function showPopupTambah() {
            popup_tambah.classList.add('open');
        }

        function hidePopupTambah() {
            popup_tambah.classList.remove('open');
        }

        function showPopupEdit() {
            const editButton = event.target;
            
            // Mengambil nilai dari atribut data pada tombol yang diklik
            const id = editButton.dataset.id;
            const nama = editButton.dataset.nama;
            const alamat = editButton.dataset.alamat;
            const nohp = editButton.dataset.nohp;
            const member = editButton.dataset.member;
            
            // Mengisi nilai-nilai ke dalam input form
            const inputId = document.querySelector(".popup_edit #id");
            const inputNama = document.querySelector(".popup_edit #nama");
            const inputAlamat = document.querySelector(".popup_edit #alamat");
            const inputNohp = document.querySelector(".popup_edit #nohp");
            const inputMember = document.querySelector(".popup_edit #member");
            
            inputId.value = id;
            inputNama.value = nama;
            inputAlamat.value = alamat;
            inputNohp.value = nohp;
            inputMember.value = member;
            
            popup_edit.classList.add('open');
        }

        function hidePopupEdit() {
            popup_edit.classList.remove('open');
        }

        function showPopupNotifikasi() {
            popup_notifikasi.classList.add('open');
        }

        function hidePopupNotifikasi() {
            popup_notifikasi.classList.remove('open');
        }



    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>