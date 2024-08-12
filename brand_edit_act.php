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

    if(isset($_POST["submit"])){
        $brand = $_POST["idbrand"];
        $nama = $_POST["nama"];
        $negara = $_POST["negara"];
        $tanggal = $_POST["tanggal"];

        $fotoBrand = $_POST["foto"];
        $fotoBrandBaru = $_FILES['foto_baru']['name'];

        //proses upload foto baru
        if(!empty($fotoBrandBaru)){
            $fotoBrand = $fotoBrandBaru;
            $tmpFile = $_FILES['foto_baru']['tmp_name'];

            $fileNameCmps = explode(".", $fotoBrand);
            $fileExtension = strtolower(end($fileNameCmps));
            $yangBoleh = array('jpg','png','jpeg');

            if(in_array($fileExtension,$yangBoleh)){
                $destination = "fotoBrand";
                $fotoBrand =  $nama.".".$fileExtension;
                $fileSimpan = $destination."/".$fotoBrand;
                $terupload = move_uploaded_file($tmpFile,$fileSimpan);

                if(!$terupload){
                    echo "<script>alert('Foto Gagal Terupload');</script>";
                }
            } else {
                echo "<script>alert('Extension tidak valid');</script>";
            }
        }
        //proses update data
        $query = "UPDATE brand_pakaian SET
                        nama_brand = '$nama',
                        negara_brand = '$negara',
                        tanggal_berdiri = '$tanggal',
                        foto_brand = '$fotoBrand'
                        WHERE id_brand = '$brand'";
            $result = mysqli_query($config,$query) or die(mysqli_connect_error());
            if($result){
                header("location:data.php");
            }else{
                echo "<script>alert('Data gagal ditambahkan');</script>";
            } 
    }
?>