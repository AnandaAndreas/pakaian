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
    $result = mysqli_query($config,"SELECT nama_brand, id_brand FROM brand_pakaian");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add - Pakaian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container card mt-5 shadow p-3 mb-5 bg-body rounded" style="width: 500px;">
        <form class="row" action="pakaian_add_act.php" method="POST" enctype="multipart/form-data">
            <h3>Tambah Pakaian</h3>
            <div class="col-md-12">
                <label for="nama">Jenis Pakaian</label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="pakaian">
                    <option selected disabled>Pakaian</option>
                    <option value="Sepatu">Sepatu</option>
                    <option value="Celana">Celana</option>
                    <option value="Baju">Baju</option>
                </select>
            </div>
            <div class="col-md-12">
                <label for="nama">Brand Pakaian</label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="brand">
                    <option selected disabled>Brand</option>
                    <?php while($data = mysqli_fetch_array($result)) {?>
                        <option name="brand" value="<?=$data['id_brand']?>"><?=$data['nama_brand']?></option>
                        <?php }?>
                </select>
            </div>
            <div class="col-md-12">
                <label for="nama">Nama Pakaian</label>
                <input type="text" name="nama" class="form-control">
            </div>
            <div class="col-md-12">
                <label for="tanggal">Tanggal Rilis</label>
                <input type="date" name="tanggal" class="form-control">
            </div>
            <div class="col-md-12">
                <label>Gender</label> <br>
                <input type="radio" name="gender" value="Laki-Laki" id="L"><label for="L">Laki-Laki</label>
                <input type="radio" name="gender" value="Perempuan" id="P"><label for="P">Perempuan</label>
                <input type="radio" name="gender" value="Unisex" id="U"><label for="U">Unisex</label>
            </div>
            <div class="col-md-12">
                <label for="foto">Foto Brand</label>
                <input type="file" name="foto" class="form-control">
            </div>
            <div class="col-md-12">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" cols="30" rows="10"></textarea>
            </div>
            <div class="col-md-12 d-flex justify-content-between mt-4">
                <a href="data.php" class="btn btn-secondary" style="width: 100px;">Kembali</a>
                <button type="submit" class="btn utama" style="width: 100px;" name="submit">Kirim</button>
            </div>
        </form>
    </div>
</body>
</html>