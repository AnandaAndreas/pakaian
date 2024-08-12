<?php 
    include "config.php";
    $brand = $_GET["id_brand"];
    mysqli_query($config,"DELETE FROM brand_pakaian WHERE id_brand = '$brand'" );
    header("location:data.php");
?>