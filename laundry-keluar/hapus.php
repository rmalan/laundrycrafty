<?php
if(isset($_GET['id'])){
	include('../koneksi.php');

	$id = $_GET['id'];
	$cek = mysql_query("SELECT id_laundry FROM tb_laundry_keluar WHERE id_laundry='$id'") or die(mysql_error());

	if(mysql_num_rows($cek) == 0){
		echo '<script>window.history.back()</script>';
	}else{		
		$del = mysql_query("DELETE FROM tb_laundry_keluar WHERE id_laundry='$id'");
		
		if($del){
            header('location:../laundry-keluar/hapus-sukses.php');
		}else{
            header('location:../laundry-keluar/hapus-gagal.php');
		}
	}
}else{
	echo '<script>window.history.back()</script>';
}
?>