<?php
include "koneksi.php";
$sql = mysqli_query($conn, "SELECT * FROM jasa where id = '$_GET[update]'");
$result = mysqli_fetch_array($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Add Service - Admin</title>
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
        background-image: url(img/dataHarga.png);
        background-size: cover;
        background-position: center;
        filter: blur(2px);
        z-index: -1;
    }

    .box{
        width:600px;
        height:500px;
        padding: 20px;
        margin: auto;
        border-radius: 15px;
        color: black;
        background-color: white;
        font-weight: bolder;
        margin-top: 50px;
        background-color: #433b3ba3;
        position: fixed;
        margin-left: 400px;
    }
</style>
<body>
    <div class="container">
        <div class="box">
            <div class="card-header">
                <h3 class="text-center font-weight-light my-4">Edit Service</h3>
            </div>
            <form action="updateJasa2.php" method="POST">
                <input class="form-control" type="file" placeholder="Foto" name="foto" required><br>
                <div class="form-floating mb-3">
                    <input class="form-control" id="inputEmail" type="text" placeholder="Nama layanan" name="nama" value="<?= $result['tipe']; ?>" required />
                    <label for="inputEmail">Nama Layanan</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" type="text" placeholder="Harga" name="harga" required />
                    <label for="inputPassword">Harga</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Lama Pengerjaan" name="waktu" required></textarea>
                    <label for="inputPassword">Lama Pengerjaan</label>
                </div>
                <a href="data_harga.php" class="btn btn-danger" style="margin-left: 20px;">Kembali</a>
                <a href="updateCustomer.php?update=<?php echo $result['id']; ?>" class="btn btn-primary" type="button">Update</a>
            </form>
        </div>
    </div>
</body>
</html>