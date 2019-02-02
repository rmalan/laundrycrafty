<?php 
    session_start();
    
    require 'functions.php';

    if(!isset($_SESSION["login"])) {
        header("Location: ../login");
        exit;
    }        

    $exits = tampil("SELECT * FROM transaksi WHERE status = 'Belum diambil' ORDER BY nama_konsumen, masuk ASC");

    if(isset($_POST['tambah'])){
        if(tambah($_POST) > 0) {
            header("Location: tambah-sukses.php");
        } 
        else {
            header("Location: tambah-gagal.php");
        }
    }

    include ('../view/header.php');
?>

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">                            
                <div class="panel panel-default">
                    <div class="panel-heading">Tambah Data Laundry Keluar</div>
                    <div class="panel-body">                                    
                        <form class="form-horizontal" role="form" action="" method="post">
                            <div class="form-group">
                                <label class="control-label col-sm-2"">Laundry :</label>                                                
                                <div class="col-sm-10">		
                                    <select class="form-control" name="id">    
                                        <option> -- Pilih -- </option>
                                        <?php foreach ($exits as $exit) : ?>
                                        <option value="<?= $exit["id"]; ?>"><?= $exit["nama_konsumen"]; ?> - <?php $masuk = $exit['masuk']; $dateMasuk = date_create("$masuk"); echo date_format($dateMasuk,"d/m/Y"); ?> - <?= $exit["berat"]; ?> kg - <?= $exit["kategori"]; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
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
            
<?php
    include('../view/footer.php');
?>