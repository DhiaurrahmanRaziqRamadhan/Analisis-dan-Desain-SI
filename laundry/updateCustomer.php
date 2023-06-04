<?php
include "koneksi.php";
$sql = mysqli_query($conn, "SELECT * FROM customer where id = '$_GET[update]'");
$result = mysqli_fetch_array($sql);
?>

<?php
    include "koneksi.php";
    $query = "SELECT *FROM jasa";
    $sql = mysqli_query($conn, $query);
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
    <title>Update Customer - Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
    <link href="css/custome_styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="icon" href="img/white 2.png">
</head>
<style>
    body::before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url(img/dataCustomer.png);
        background-size: cover;
        background-position: center;
        filter: blur(2px);
        z-index: -1;
    }

    .box{
        width:700px;
        height:600px;
        padding: 20px;
        margin: auto;
        border-radius: 15px;
        color: black;
        background-color: white;
        font-weight: bolder;
        margin-top: 50px;
        background-color: #433b3ba3;
        position: fixed;
        margin-left: 350px;
    }
</style>
<body>
    <div class="container">
        <div class="box">
            <div class="card-header">
                <h3 class="text-center font-weight-light my-4">Add Customer</h3>
            </div>
            <form action="" method="POST">
                <div class="form-floating mb-3">
                    <input class="form-control" id="inputEmail" type="text" placeholder="name@example.com" name="nama" value="<?= $result['nama']; ?>" required />
                    <label for="inputEmail">Nama Lengkap</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Password" name="alamat" required><?= $result['alamat']; ?></textarea>
                    <label for="inputPassword">Alamat</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" type="text" placeholder="Password" name="tanggal" value="<?= $result['tanggal_pemesanan']; ?>" required />
                    <label for="inputPassword">Tanggal Pemesanan</label>
                </div>
                <div class="mb-5 row">
                    <div class="col-sm-15">
                        <select class="form-select" aria-label="Default select example" name="opsi">
                            <option selected>Pilih Tipe Paket</option>
                            <?php while($result = mysqli_fetch_assoc($sql)) { ?>
                                    <option value="<?= $result['tipe']; ?>"><?= $result['tipe']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div><br><br><br>
                <a href="data_customer.php" class="btn btn-danger" style="margin-left: 50px;">Kembali</a>
                <input type="submit" value="Update" name="update" class="btn btn-primary" style="margin-left: 400px;">
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php 
if (isset($_POST['update'])) {
    mysqli_query($conn, "UPDATE customer  SET
    nama = '$_POST[nama]',
    alamat = '$_POST[alamat]',
    tanggal_pemesanan = '$_POST[tanggal]',
    tipe_paket = '$_POST[opsi]' WHERE id=$_GET[update]") or die(mysqli_error($conn));

    echo "<script>alert('Data telah tersimpan');
    document.location='data_customer.php'</script>";
}
?>