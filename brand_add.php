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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add - Brand</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container card mt-5 shadow p-3 mb-5 bg-body rounded" style="width: 700px;">
        <form class="row" action="brand_add_act.php" method="POST" enctype="multipart/form-data">
            <h3>Tambah Brand</h3>
            <div class="col-md-6">
                <label for="nama">Nama Brand</label>
                <input type="text" name="nama" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="negara">Asal Negara</label>
                <input type="text" name="negara" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="tanggalberdiri">Tanggal Berdiri</label>
                <input type="date" name="tanggal" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="foto">Foto Brand</label>
                <input type="file" name="foto" class="form-control">
            </div>
            <div class="col-md-12 d-flex justify-content-between mt-4">
            <a href="data.php" class="btn btn-secondary" style="width: 100px;">Kembali</a>
                <button type="submit" class="btn utama" style="width: 100px;" name="submit">Kirim</button>
            </div>
        </form>
    </div>
</body>
</html>