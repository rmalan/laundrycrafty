<?php
if(isset($_POST['simpan'])){
	include('../koneksi.php');

	$id			        = $_POST['id'];
    $nm_konsumen		= $_POST['nm_konsumen'];
	$berat          	= $_POST['berat'];
	$nm_ktgr 			= $_POST['nm_ktgr'];
	$tarif 				= $_POST['tarf'];
	
    $update = mysql_query("UPDATE tb_laundry_masuk SET nm_konsumen='$nm_konsumen', berat='$berat', nm_ktgr='$nm_ktgr', harga='$tarif' WHERE id_laundry='$id'") or die(mysql_error());

	if($update){
        header('location:../laundry-masuk/edit-sukses.php');
	}else{
        header('location:../laundry-masuk/edit-gagal.php');
	}
}else{
	echo '<script>window.history.back()</script>';
}
?>