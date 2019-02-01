<?php 
    session_start();
    
    require 'functions.php';

    if(!isset($_SESSION["login"])) {
        header("Location: ../login");
        exit;
    }        

    $enters = tampil("SELECT * FROM transaksi");

    include ('../view/header.php');
?>

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">                            
                <div class="panel panel-default">
                    <div class="panel-heading">Data Laundry Masuk</div>
                    <div class="panel-body">                                    
                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal Masuk</th>                                    
                                    <th>Nama Konsumen</th>
                                    <th>Berat (kg)</th>
                                    <th>Kategori</th>  
                                    <th>Opsi</th>                                  
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($enters as $enter) : ?>                                                                
                                <tr>
                                    <td><?= $no; ?>.</td>
                                    <?php
                                        $masuk = $enter['masuk'];
                                        $date = date_create("$masuk");
                                    ?>
                                    <td><?= date_format($date,"d/m/Y"); ?></td>                                    
                                    <td><?= $enter["nama_konsumen"] ?></td>
                                    <td><?= $enter["berat"] ?></td>
                                    <td><?= $enter["kategori"] ?></td>                                    
                                    <td><a href="ubah.php?id=<?= $enter["id"]; ?>"><span class="glyphicon glyphicon-edit" title="Edit Data"></span></a> | <a href="hapus.php?id=<?= $enter["id"]; ?>"><span class="glyphicon glyphicon-remove" title="Hapus Data" onclick="return confirm('Yakin?')"></span></a></td>
                                </tr>               
                                <?php $no++; ?>                 
                                <?php endforeach; ?>                    
                            </tbody>
                        </table>
                        <div class="text-center">
                            <a href="tambah.php"><button type="button" class="btn btn-primary">Tambah Data</button></a>
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