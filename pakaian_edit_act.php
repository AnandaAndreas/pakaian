<?php 
    session_start();
    include ("config.php");
    //check apakah sudah login
    if(!isset($_SESSION['login'])){
        echo '<script>';
        echo 'alert("Login Terlebih Dahulu");';
        echo 'window.location.href="admin_login.php";';
        echo '</script>';
    }

    if(isset($_POST["submit"])){
        $idpakaian = $_POST["idpakaian"];
        $pakaian = $_POST["pakaian"];
        $nama = $_POST["nama"];
        $tanggal = $_POST["tanggal"];
        $deskripsi = $_POST["deskripsi"];
        $gender = $_POST["gender"];
        $brand = $_POST["brand"];
        //upload foto
        $foto = $_POST["foto"];
        $fotoBaru = $_FILES['foto_baru']['name'];
        //proses upload foto baru
        if(!empty($fotoBaru)){
            $foto = $fotoBaru;
            $tmpFile = $_FILES['foto_baru']['tmp_name'];

            $fileNameCmps = explode(".", $foto);
            $fileExtension = strtolower(end($fileNameCmps));
            $yangBoleh = array('jpg','png','jpeg');

            if(in_array($fileExtension,$yangBoleh)){
                $destination = "fotoPakaian";
                $foto =  $nama.".".$fileExtension;
                $fileSimpan = $destination."/".$foto;
                $terupload = move_uploaded_file($tmpFile,$fileSimpan);

                if(!$terupload){
                    echo "<script>alert('Foto Gagal Terupload');</script>";
                }
            } else {
                echo "<script>alert('Extension tidak valid');</script>";
            }
        }

        $query = "UPDATE pakaian SET
                jenis_pakaian = '$pakaian',
                nama_pakaian = '$nama',
                tanggal_rilis = '$tanggal',
                deskripsi_pakaian = '$deskripsi',
                gender_pakaian = '$gender',
                foto_pakaian = '$foto',
                id_brand = $brand
                WHERE id_pakaian = $idpakaian";
        $result = mysqli_query($config,$query) or die(mysqli_connect_error());
        if($result){
            header("location:data.php");
        }else{
            echo "<script>alert('Data gagal ditambahkan');</script>";
        }
    }
?>