<?php
    session_start();

    require '../koneksi.php';

    if(isset($_COOKIE["id"]) && isset($_COOKIE["key"])) {
        $id = $_COOKIE["id"];
        $key = $_COOKIE["key"];
        
        $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
        $row = mysqli_fetch_assoc($result);
        
        if($key === hash("sha256", $row["username"])) {
            $_SESSION["login"] = true;
            $_SESSION["user"] = $row["username"];
        }
    }

    if(isset($_SESSION["login"])) {
        header("Location: ../index.php");
        exit;
    }

    if(isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
        
        if(mysqli_num_rows($result) === 1) {		
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row["password"])) {			
                $_SESSION["login"] = true;
                $_SESSION["user"] = $row["username"];
                
                if(isset($_POST["remember"])) {				
                    setcookie("id", $row["id"], time()+1800);
                    setcookie("key", hash("sha256", $row["username"]), time()+1800);
                }
                
                header("Location: ../index.php");
                exit;
            }
        }
        
        $error = true;
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Jekyll v3.8.5">
        <title>Login | Laundry Crafty</title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="signin.css">    
    </head>
    <body class="text-center">
        <form class="form-signin" action="" method="post">
            <img class="mb-4" src="icons8-the-flash-sign.svg" alt="" width="86" height="86">

            <h1 class="h3 mb-3 font-weight-normal">Laundry Crafty</h1>

            <label for="username" class="sr-only">Username</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus>

            <label for="password" class="sr-only">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>

            <div class="checkbox mb-3">
                <label for="remember">
                    <input type="checkbox" name="remember" id="remember"> Remember Me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>
            <?php if(isset($error)) : ?>
                <script>alert('Username atau password salah!')</script>
            <?php endif; ?>
            <p class="mt-5 mb-3 text-muted">&copy; 2017</p>
        </form>
    </body>
</html>
