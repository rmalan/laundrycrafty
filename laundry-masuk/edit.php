<?php
session_start();
if(!isset($_SESSION['id_user'])) {
    header('location:../login'); 
} else { 
    $username = $_SESSION['id_user']; 
}
?>

<?php	
    include('../koneksi.php');
    $id = $_GET['id'];	
    $show = mysql_query("SELECT * FROM tb_laundry_masuk WHERE id_laundry='$id'");

    if(mysql_num_rows($show) == 0){
        echo '<script>window.history.back()</script>';		
    }else{	
        $data = mysql_fetch_assoc($show);	
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Laundry Masuk - Laundry Crafty</title>
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
                                <div class="panel-heading">Edit Data Laundry Masuk</div>
                                <div class="panel-body">                                    
                                    <form class="form-horizontal" role="form" action="edit-proses.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Nama Konsumen :</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nm_konsumen" placeholder="Nama Konsumen" value="<?php echo $data['nm_konsumen']; ?>"  required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Berat (kg) :</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="berat" placeholder="Berat" value="<?php echo $data['berat']; ?>" required>
                                            </div>
                                        </div>                                                                                                                                                                                                                                                
                                        <?php    
                                            include('../koneksi.php')    ;
                                            $result = mysql_query("select * from tb_kategori");  
                                            $jsArray = "var ktgrName = new Array();\n";  
                                            echo '<div class="form-group">';
                                                echo '<label class="control-label col-sm-2" for="ctgry">Kategori :</label>';                                                
                                                echo '<div class="col-sm-10">';
                                                    echo '<select class="form-control" id="ctgry" name="nm_ktgr" onchange="document.getElementById(\'trf\').value = ktgrName[this.value]">';  
                                                        echo '<option></option>';  
                                                        while ($row = mysql_fetch_array($result)) {  
                                                            echo '<option value="' . $row['nm_ktgr'] . '">' . $row['nm_ktgr'] . '</option>';  
                                                            $jsArray .= "ktgrName['" . $row['nm_ktgr'] . "'] = '" . addslashes($row['tarif']) . "';\n";  
                                                        }  
                                                    echo '</select>';  
                                                echo '</div>';
                                            echo '</div>';
                                        ?>                                          
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Harga :</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="tarf" id="trf" class="form-control" placeholder="Harga" readonly>
                                            </div>
                                        </div>
                                        <script type="text/javascript">  
                                            <?php echo $jsArray; ?>  
                                        </script>                                        
                                        <div class="text-center">
                                            <button class="btn btn-primary" name="simpan" value="Tambah" type="submit">Simpan</button>
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