<?php 
    session_start();
    
    require 'functions.php';

    if(!isset($_SESSION["login"])) {
        header("Location: ../login");
        exit;
    }        

    $categories = tampil("SELECT * FROM kategori");

    include ('../view/header.php');
?>

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">                            
                <div class="panel panel-default">
                    <div class="panel-heading">Data Kategori</div>
                    <div class="panel-body">                                    
                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Kategori</th>
                                    <th>Tarif</th>                                                
                                    <th>Opsi</th> 
                                </tr>
                            </thead>
                            <tbody>                                
                                <?php $no = 1; ?>
                                <?php foreach ($categories as $category) : ?>                                                                
                                <tr>
                                    <td><?= $no; ?>.</td>
                                    <td><?= $category["nama"] ?></td>
                                    <td><?= $category["tarif"] ?></td>
                                    <td><a href="ubah.php?id=<?= $category["id"]; ?>"><span class="glyphicon glyphicon-edit" title="Edit Data"></span></a> | <a href="hapus.php?id=<?= $category["id"]; ?>"><span class="glyphicon glyphicon-remove" title="Hapus Data" onclick="return confirm('Yakin?')"></span></a></td>
                                </tr>               
                                <?php $no++; ?>                 
                                <?php endforeach; ?>                                
                            </tbody>
                        </table>
                        <div class="text-center">
                            <a href="../kategori/tambah.php"><button type="button" class="btn btn-primary">Tambah Data</button></a>
                        </div>
                    </div>
                </div>                                                            
            </div>
        </div>
    </div>
</div>

<?php
    include('../view/footer.php'); 
?>