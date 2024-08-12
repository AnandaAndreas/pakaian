<?php 
    session_start();
    include "config.php";
    //check apakah sudah login
    if(!isset($_SESSION['login'])){
        echo '<script>';
        echo 'alert("Login Terlebih Dahulu");';
        echo 'window.location.href="admin_login.php";';
        echo '</script>';
    }
    $brand = $_GET["id_brand"];
    $query = "SELECT * FROM brand_pakaian WHERE id_brand = '$brand'";
    $result = mysqli_query($config, $query);
    $data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit - Brand</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container card mt-5 shadow p-3 mb-5 bg-body rounded" style="width: 700px;">
        <form class="row" action="brand_edit_act.php" method="POST" enctype="multipart/form-data">
            <h3>Edit Brand</h3>
            <input value="<?=$data['id_brand'];?>" type="text" name="idbrand" class="form-control" hidden>
            <div class="col-md-6">
                <label for="nama">Nama Brand</label>
                <input value="<?=$data['nama_brand'];?>" type="text" name="nama" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="negara">Asal Negara</label>
                <input value="<?=$data['negara_brand'];?>" type="text" name="negara" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="tanggalberdiri">Tanggal Berdiri</label>
                <input value="<?=$data['tanggal_berdiri'];?>" type="date" name="tanggal" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="foto">Foto Brand</label>
                <input value="<?=$data['foto_brand'];?>" type="hidden" name="foto" class="form-control">
                <input type="file" name="foto_baru" class="form-control">
            </div>
            <div class="col-md-12 d-flex justify-content-between mt-4">
            <a href="data.php" class="btn btn-secondary" style="width: 100px;">Kembali</a>
                <button type="submit" class="btn utama" style="width: 100px;" name="submit">Kirim</button>
            </div>
        </form>
    </div>
</body>
</html>