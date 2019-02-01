<?php 
    session_start();

    require 'functions.php';

    if(!isset($_SESSION["login"])) {
        header("Location: ../index.php");
        exit;
    }

    $id = $_GET["id"];
    $category = tampil("SELECT * FROM kategori WHERE id = $id")[0];

    if(isset($_POST['update'])){
        if(ubah($_POST) > 0) {
            header("Location: ubah-sukses.php");
        }
        else {
            header("Location: ubah-gagal.php?id=$id");
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
                    <div class="panel-heading">Ubah Data Kategori</div>
                    <div class="panel-body">                                    
                        <form class="form-horizontal" role="form" action="" method="post">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Nama Kategori :</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="id" value="<?= $category["id"]; ?>">
                                    <input type="text" class="form-control" name="nama_kategori" placeholder="Nama Kategori" value="<?= $category["nama"]; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Tarif :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tarif" placeholder="Tarif" value="<?= $category["tarif"]; ?>" required>
                                </div>
                            </div>                                                                    
                            <div class="text-center">
                                <button class="btn btn-primary" name="update" value="update" type="submit">Perbaharui</button>
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