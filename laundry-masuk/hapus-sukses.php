<?php
session_start();
if(!isset($_SESSION['id_user'])) {
    header('location:../login'); 
} else { 
    $username = $_SESSION['id_user']; 
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Laundry Crafty</title>
	    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/main.css">      
        <link href="../css/sidebar.css" rel="stylesheet">         
        <script src="../js/jquery-1.12.3.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php include('../view/navbar.php'); ?>
        <div id="wrapper">            
            <?php include('../view/sidebar.php'); ?>
            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="homepage">
                                <div class="text-center">
                                    <h2>Selamat</h2>
                                    <p>
                                        Data telah berhasil dihapus :]
                                        <br /><a href="/laundry-masuk">Kembali</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="text-center">
                <p>
                    Copyright 2017 <span class="glyphicon glyphicon-copyright-mark"></span> Laundry Crafty All Rights Reserved<br />
                    Made with <span class="glyphicon glyphicon-heart"></span>  Powered by <a href="http://www.unib.ac.id" re="nofollow" target="_blank">Universitas Bengkulu</a>
                </p>
                </p>
            </footer>
            <!-- /#page-content-wrapper -->
        </div>
        <!-- /#wrapper -->               
        <script>
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>
    </body>
</html>