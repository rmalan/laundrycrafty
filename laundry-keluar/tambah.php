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
        <title>Laundry Keluar - Laundry Crafty</title>
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
                            <div class="panel panel-default">
                                <div class="panel-heading">Tambah Data Laundry Keluar</div>
                                <div class="panel-body">                                    
                                    <form class="form-horizontal" role="form" action="tambah-proses.php" method="post">
                                        <?php    
                                            include('../koneksi.php');
                                            $result = mysql_query("select * from tb_laundry_masuk");    
                                            $jsArray = "var laundryName = new Array();\n";
                                            echo '<div class="form-group">';
                                                echo '<label class="control-label col-sm-2" for="idldry">ID Laundry :</label>';                                                
                                                echo '<div class="col-sm-10">';		
                                                    echo '<select class="form-control" id="idldry"  name="ldrID" onchange="changeValue(this.value)">';    
                                                        echo '<option></option>';    
                                                        while ($row = mysql_fetch_array($result)) {    
                                                            echo '<option value="' . $row['id_laundry'] . '">' . $row['id_laundry'] . '</option>';    
                                                            $jsArray .= "laundryName['" . $row['id_laundry'] . "'] = {nama:'" . addslashes($row['nm_konsumen']) . "', brat:'".addslashes($row['berat'])."',ktgri:'".addslashes($row['nm_ktgr'])."', hrga:'".addslashes($row['harga'])."'};\n";    
                                                        }    
                                                    echo '</select>';
                                                echo '</div>';
                                            echo '</div>';     
                                        ?>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Nama Konsumen :</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama_konsumen" id="nm_konsumen" placeholder="Nama Konsumen" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Berat (kg) :</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="berat" id="brt" placeholder="Berat" readonly>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Kategori :</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="kategori" id="ktgr" placeholder="Kategori" readonly>
                                            </div>
                                        </div>                                                                                                                                                                                                                                                                                                                                  
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Harga :</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="harga" id="hrg" class="form-control" placeholder="Harga" readonly>
                                            </div>
                                        </div>
                                        <script type="text/javascript">    
                                            <?php echo $jsArray; ?>  
                                            function changeValue(id){  
                                            document.getElementById('nm_konsumen').value = laundryName[id].nama;  
                                            document.getElementById('brt').value = laundryName[id].brat;  
                                            document.getElementById('ktgr').value = laundryName[id].ktgri;  
                                            document.getElementById('hrg').value = laundryName[id].hrga;  
                                            };  
                                        </script>                                        
                                        <div class="text-center">
                                            <button class="btn btn-primary" name="tambah" value="Tambah" type="submit">Tambah</button>
                                        </div>                                        
                                    </form>                                    
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