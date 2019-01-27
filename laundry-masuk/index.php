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
        <title>Laundry Masuk | Laundry Crafty</title>
	    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/main.css">      
        <link href="/css/sidebar.css" rel="stylesheet">         
        <script src="/js/jquery-1.12.3.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>

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
                            <div class="panel panel-default">
                                <div class="panel-heading">Data Laundry Masuk</div>
                                <div class="panel-body">                                    
                                    <table class="table table-striped table-responsive">
                                        <thead>
                                            <tr>
                                                <th>ID Laundry</th>
                                                <th>Tanggal</th>
                                                <th>Jam</th>
                                                <th>Nama Konsumen</th>
                                                <th>Berat (kg)</th>
                                                <th>Kategori</th>
                                                <th>Opsi</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php                                            
                                                include('../koneksi.php');				
                                        
                                                $query = mysql_query("SELECT * FROM tb_laundry_masuk") or die(mysql_error());

                                                if(mysql_num_rows($query) == 0){                                            
                                                    echo '<tr><td colspan="7">Tidak ada data!</td></tr>';
                                                }else{
                                                    while($data = mysql_fetch_assoc($query)){                                                
                                                        echo '<tr>';                
                                                        echo '<td>'.$data['id_laundry'].'</td>';
                                                        echo '<td>'.$data['tgl'].'</td>';
                                                        echo '<td>'.$data['jam'].'</td>';
                                                        echo '<td>'.$data['nm_konsumen'].'</td>';
                                                        echo '<td>'.$data['berat'].'</td>';
                                                        echo '<td>'.$data['nm_ktgr'].'</td>';
                                                        echo '<td><a href="../laundry-masuk/edit.php?id='.$data['id_laundry'].'"><span class="glyphicon glyphicon-edit" title="Edit Data"></span></a> / <a href="../laundry-masuk/hapus.php?id='.$data['id_laundry'].'" onclick="return confirm(\'Yakin?\')"><span class="glyphicon glyphicon-remove" title="Hapus Data"></span></a></td>';
                                                        echo '</tr>';								
                                                                                                    }			            		
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                    <div class="text-center">
                                        <a href="../laundry-masuk/tambah.php"><button type="button" class="btn btn-primary">Tambah Data</button></a>
                                    </div>
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