<?php
    require('../koneksi.php');

    function tampil($query) {
        global $conn;

        $result = mysqli_query($conn, $query);

        $rows = [];

        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }

    function tambah($data) {
        global $conn;

        $id = $data["id"];        

        mysqli_query($conn, "UPDATE transaksi SET status = 'Sudah Diambil', diambil = NOW() WHERE id = $id");

        return mysqli_affected_rows($conn);
    }

    function hapus($id) {
        global $conn;
        
        mysqli_query($conn, "UPDATE transaksi SET status = 'Belum Diambil', diambil = NULL WHERE id = $id");

        return mysqli_affected_rows($conn);
    }
?>