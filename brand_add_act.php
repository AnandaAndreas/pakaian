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
        $nama = $_POST["nama"];
        $negara =$_POST["negara"];
        $tanggal = $_POST["tanggal"];
        //upload foto
        $foto = $_FILES['foto']['name'];
        $tmpFile = $_FILES['foto']['tmp_name'];

        $fileNameCmps = explode(".", $foto);
        $fileExtension = strtolower(end($fileNameCmps));
        $yangBoleh = array('jpg','png','jpeg');

        if(in_array($fileExtension,$yangBoleh)){
            $destination = "fotoBrand";
            $namaFileBaru =  $nama.".".$fileExtension;
            $fileSimpan = $destination."/".$namaFileBaru;
            $terupload = move_uploaded_file($tmpFile,$fileSimpan);

            if(!$terupload){
                echo "<script>alert('Foto Gagal Terupload');</script>";
            }
        }

        $query = "INSERT INTO brand_pakaian VALUES
                ('','$nama','$negara','$tanggal','$namaFileBaru')";
        $result = mysqli_query($config,$query) or die(mysqli_connect_error());
        if($result){
            header("location:data.php");
        }else{
            echo "<script>alert('Data gagal ditambahkan');</script>";
        }
    }
?>