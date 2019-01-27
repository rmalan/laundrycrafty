<?php
    if(isset($_POST['tambah'])){
	    include('../koneksi.php');

        $nm_konsumen		= $_POST['nm_konsumen'];
	    $berat          	= $_POST['berat'];
	    $nm_ktgr 			= $_POST['nm_ktgr'];
	    $tarif 				= $_POST['tarf'];
	
	    $input = mysql_query("INSERT INTO tb_laundry_masuk VALUES(NOW(), NOW(), NOW(), '$nm_konsumen', '$berat', '$nm_ktgr', '$tarif')") or die(mysql_error());

        if($input){
            header('location:../laundry-masuk/data-sukses.php');
	    }else{
            header('location:../laundry-masuk/data-gagal.php');

	    }
    }else{
	    echo '<script>window.history.back()</script>';
    }
?>