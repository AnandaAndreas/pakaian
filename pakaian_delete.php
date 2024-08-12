<?php 
    include "config.php";
    $pakaian = $_GET["id_pakaian"];
    mysqli_query($config,"DELETE FROM pakaian WHERE id_pakaian = '$pakaian'" );
    header("location:data.php");
?>