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
    $pakaian = $_GET["id_pakaian"];
    $query = "SELECT * FROM pakaian WHERE id_pakaian = '$pakaian'";
    $result = mysqli_query($config, $query);
    $data = mysqli_fetch_assoc($result);

    $resultBrand = mysqli_query($config,"SELECT nama_brand, id_brand FROM brand_pakaian");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit - Pakaian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container card mt-5 shadow p-3 mb-5 bg-body rounded" style="width: 500px;">
        <form class="row" action="pakaian_edit_act.php" method="POST" enctype="multipart/form-data">
            <h3>Edit Pakaian</h3>
            <input type="text" name="idpakaian" value="<?= $data['id_pakaian']?>" hidden>
            <div class="col-md-12">
                <label for="nama">Jenis Pakaian</label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="pakaian">
                    <option disabled>Pakaian</option>
                    <option value="Sepatu" <?= $data['jenis_pakaian'] == 'Sepatu' ? 'selected' : '' ?> >Sepatu</option>
                    <option value="Celana" <?= $data['jenis_pakaian'] == 'Celana' ? 'selected' : '' ?>>Celana</option>
                    <option value="Baju" <?= $data['jenis_pakaian'] == 'Baju' ? 'selected' : '' ?>>Baju</option>
                </select>
            </div>
            <div class="col-md-12">
                <label for="nama">Brand Pakaian</label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="brand">
                    <option disabled>Brand</option>
                    <?php while($dataBrand = mysqli_fetch_array($resultBrand)) {?>
                        <option name="brand" value="<?=$dataBrand['id_brand']?>" <?= $dataBrand['id_brand'] == $data['id_brand'] ? 'selected' : '' ?> > <?=$dataBrand['nama_brand']?></option>
                        <?php }?>
                </select>
            </div>
            <div class="col-md-12">
                <label for="nama">Nama Pakaian</label>
                <input type="text" name="nama" class="form-control" value="<?= $data['nama_pakaian'];?>">
            </div>
            <div class="col-md-12">
                <label for="tanggal">Tanggal Rilis</label>
                <input type="date" name="tanggal" class="form-control" value="<?= $data['tanggal_rilis'];?>">
            </div>
            <div class="col-md-12">
                <label>Gender</label> <br>
                <input type="radio" name="gender" value="Laki-Laki" id="L" <?= $data['gender_pakaian'] == 'Laki-Laki' ? 'checked' : '' ?> >
                <label for="L">Laki-Laki</label>
                <input type="radio" name="gender" value="Perempuan" id="P" <?= $data['gender_pakaian'] == 'Perempuan' ? 'checked' : '' ?>>
                <label for="P">Perempuan</label>
                <input type="radio" name="gender" value="Unisex" id="U" <?= $data['gender_pakaian'] == 'Unisex' ? 'checked' : '' ?>>
                <label for="U">Unisex</label>
            </div>
            <div class="col-md-12">
                <label for="foto">Foto Brand</label>
                <input type="file" name="foto_baru" class="form-control">
                <input type="hidden" name="foto" class="form-control" value="<?= $data['foto_pakaian'];?>">
            </div>
            <div class="col-md-12">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" cols="30" rows="10"> <?= $data['deskripsi_pakaian'];?></textarea>
            </div>
            <div class="col-md-12 d-flex justify-content-between mt-4">
            <a href="data.php" class="btn btn-secondary" style="width: 100px;">Kembali</a>
                <button type="submit" class="btn utama" style="width: 100px;" name="submit">Kirim</button>
            </div>
        </form>
    </div>
</body>
</html>