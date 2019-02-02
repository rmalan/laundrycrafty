<?php 
    session_start();
    
    require 'functions.php';

    if(!isset($_SESSION["login"])) {
        header("Location: ../login");
        exit;
    }        

    $exits = tampil("SELECT * FROM transaksi WHERE status = 'Sudah diambil'");

    include ('../view/header.php');
?>

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">                            
                <div class="panel panel-default">
                    <div class="panel-heading">Data Laundry Keluar</div>
                    <div class="panel-body">                                    
                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Tanggal Keluar</th>                                    
                                    <th>Nama Konsumen</th>
                                    <th>Berat (kg)</th>
                                    <th>Kategori</th>
                                    <th>Harga (/kg)</th>
                                    <th>Total</th>
                                    <th>Diambil Pada</th>
                                    <th>Opsi</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($exits as $exit) : ?>
                                <tr>
                                    <td><?= $no; ?>.</td>
                                    <?php
                                        $masuk = $exit['masuk'];
                                        $dateMasuk = date_create("$masuk");
                                    ?>
                                    <td><?= date_format($dateMasuk,"d/m/Y"); ?></td>
                                    <?php
                                        $keluar = $exit['keluar'];
                                        $dateKeluar = date_create("$keluar");
                                    ?>
                                    <td><?= date_format($dateKeluar,"d/m/Y"); ?></td>
                                    <td><?= $exit["nama_konsumen"] ?></td>
                                    <td><?= $exit["berat"] ?></td>
                                    <td><?= $exit["kategori"] ?></td>
                                    <td><?= $exit["harga_satuan"] ?></td>
                                    <td><?= $exit["harga_total"] ?></td>
                                    <?php
                                        $diambil = $exit['diambil'];
                                        $dateDiambil = date_create("$diambil");
                                    ?>
                                    <td><?= date_format($dateDiambil,"d/m/Y"); ?></td>
                                    <td><a href="hapus.php?id=<?= $exit["id"]; ?>"><span class="glyphicon glyphicon-remove" title="Hapus Data" onclick="return confirm('Yakin?')"></span></a></td>
                                </tr>               
                                <?php $no++; ?>                 
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="text-center">
                            <a href="../laundry-keluar/tambah.php"><button type="button" class="btn btn-primary">Tambah Data</button></a>
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