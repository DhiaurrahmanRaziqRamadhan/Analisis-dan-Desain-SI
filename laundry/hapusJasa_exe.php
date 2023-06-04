<?php
include "koneksi.php";

if (isset($_GET['delete'])) {
    $sql = mysqli_query($conn, "DELETE FROM jasa where id = '$_GET[delete]'")
    or die(mysqli_error($conn));

    echo "<p><b> Data berhasil dihapus</b></p>";
    echo "<meta http-equiv=refresh content=2;URL='data_harga.php'>";
}
?>