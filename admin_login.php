<?php 
    session_start();
    include "config.php";
    if(isset($_POST["login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $query = "SELECT username FROM admin WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($config,$query);
        if(!$result){
            die("ERROR".mysqli_error($config));
        }
        if(mysqli_num_rows($result)>0){
            $_SESSION['login'] = true;
            header('location:data.php');
        }else{
            echo "<script>
                alert('Akun Tidak Ada');
            </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container card mt-5 shadow p-3 mb-5 bg-body rounded" style="width:300px; height: 300px">
        <h3 class="text-center mt-3">Sign In</h3>
        <form class="row g-3" method="POST" action="">
            <div class="col-md-12">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="col-md-12">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <button class="utama btn" name="login">LOGIN</button>
        </form>
    </div>
</body>
</html>