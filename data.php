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
    <title>Pakaian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container card mt-5 shadow p-3 mb-5 bg-body rounded">
        <div class="wraper d-flex justify-content-between">
            
            <div class="kiri">
                    <select id="jenisdata" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option value="" disabled selected> Pilih Data</option>
                        <option value ="pakaian">List Pakaian</option>
                        <option value="brand">List Brand</option>
                    </select>
                <a href="pakaian_add.php" class="btn utama">Tambah Pakaian</a>
                <a href="brand_add.php" class="btn utama">Tambah Brand</a>
            </div>

            <div class="kanan">
                <a href="admin_logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
        <div id="tabelData">
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#jenisdata').change(function() {
                        var selectedOption = $(this).val();
                        if (selectedOption === "pakaian") {
                            // Jika Pakaian dipilih, ambil dan tampilkan tabel pakaian
                            $.ajax({
                                url: 'table_pakaian.php', 
                                success: function(data) {
                                    $('#tabelData').html(data);
                                }
                            });
                        } else if (selectedOption === "brand") {
                            // Jika Brand dipilih, ambil dan tampilkan tabel brand
                            $.ajax({
                                url: 'table_brand.php', 
                                success: function(data) {
                                    $('#tabelData').html(data);
                                }
                            });
                        }
                    });
                });
            </script>
        </div>
    </div>
</body>
</html>