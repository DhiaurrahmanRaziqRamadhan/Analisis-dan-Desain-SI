<?php
include "koneksi.php";
$sql = mysqli_query($conn, "SELECT * FROM jasa where id = '$_POST[id_jasa]'");
$result = mysqli_fetch_array($sql);

if (isset($_POST['edit_data'])) {
    $foto = $_POST['foto'];
    $tipe = $_POST['tipe'];
    $harga = $_POST['harga'];
    $waktu = $_POST['waktu'];

    $query = "UPDATE jasa SET
              foto='$foto',
              tipe='$tipe',
              harga='$harga',
              waktu='$waktu'
              WHERE id='$_GET[id]'";

    if (mysqli_query($conn, $query)) {
        echo "Record updated successfully";
        header('Location: data_harga.php');
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

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
            <form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $_POST['id_jasa']; ?>" method="POST">
                <div class="mb-3">
                    <input class="form-control" type="file" placeholder="foto" name="foto" value="<?= $result['foto']; ?>" required>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="tipe" type="text" placeholder="tipe" name="tipe" value="<?= $result['tipe']; ?>" required />
                    <label for="tipe">Nama Layanan</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" type="text" placeholder="harga" name="harga" value="<?= $result['harga']; ?>" required />
                    <label for="harga">Harga</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" type="text" placeholder="waktu" name="waktu" value="<?= $result['waktu']; ?>" required>
                    <label for="waktu">Lama Pengerjaan</label>
                </div>
                <a href="updateJasa.php" class="btn btn-danger" style="margin-left: 20px;">Kembali</a>
                <input type="submit" name="edit_data" value="Update" class="btn btn-primary">
            </form>
        </div>
    </div>
</body>
</html>
