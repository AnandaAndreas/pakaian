<?php 
    $config = mysqli_connect("localhost","root","","pakaian");
    if(!$config){
        die('Gagal terhubung ke Database : '.mysqli_connect_error());
    }
?>