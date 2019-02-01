<?php 
    session_start();
    
    require 'functions.php';

    if(!isset($_SESSION["login"])) {
        header("Location: ../index.php");
        exit;
    }

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
                    <div class="panel-heading">Tambah Data Kategori</div>
                    <div class="panel-body">                                    
                        <form class="form-horizontal" role="form" action="" method="post">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Nama Kategori :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_kategori" placeholder="Nama Kategori" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Tarif :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tarif" placeholder="Tarif" required>
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
<?php include('../view/footer.php'); ?>