<?php
    if(isset($_POST['tambah'])){
	    include('../koneksi.php');
	
        $id_laundry         = $_POST['ldrID'];
	    $nm_konsumen		= $_POST['nama_konsumen'];
	    $berat          	= $_POST['berat'];
	    $nm_ktgr 			= $_POST['kategori'];
	    $tarif 				= $_POST['harga'];
        $total              = $berat * $tarif;

	    $input = mysql_query("INSERT INTO tb_laundry_keluar VALUES('$id_laundry', NOW(), NOW(), '$nm_konsumen', '$berat', '$nm_ktgr', '$tarif', '$total')") or die(mysql_error());

	    if($input){
            header('location:../laundry-keluar/data-sukses.php');
	    }else{
            header('location:../laundry-keluar/data-gagal.php');
	    }

    }else{
	    echo '<script>window.history.back()</script>';
    }
?>