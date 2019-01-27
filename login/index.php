<?php
   session_start();
   if(isset($_SESSION['id_user'])) {
   header('location:index.php'); }
   require_once("../koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />   
    <meta name="viewport" content="width=device-width, initial-scale=1" />    
    <title>Login | Laundry Crafty</title>    
    <link href="/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/css/signin.css" rel="stylesheet" />
    <script src="/js/jquery-1.12.3.min.js"></script>
    <script src="/js/bootstrap.js"></script>
</head>

<body background="../img/page-background.png">
    <div class="container">
        <form class="form-signin" action="../login/proseslogin.php" method="post">
            <center>
                <h2 class="form-signin-heading">
                    <span class="glyphicon glyphicon-th-large"></span>Laundry Crafty
                </h2>
            </center>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-user"></i>
                </span>
                <input type="text" id="username" name="username" class="form-control" placeholder="Username" autocomplete="off" autofocus="on" required />
            </div>
            <div class="input-group" style="margin-top: 5px;">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-lock"></i>
                </span>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" autocomplete="off" required />
            </div>
            <br />
            <button class="btn btn-lg btn-primary btn-block" value="Login" type="submit">Sign in</button>
        </form>

    </div><!-- /container -->

    <center>
        <h5 class="form-signin">
            Copyright &copy; 2017
        </h5>
    </center>
</body>
</html>
