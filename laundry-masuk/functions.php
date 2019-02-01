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

        $nama = htmlspecialchars($data["nama_konsumen"]);
        $berat = $data["berat"];
        $kategori = htmlspecialchars($data["kategori"]);
        $harga = $data["harga"];
        $total = $berat * $harga;


        mysqli_query($conn, "INSERT INTO transaksi(masuk, keluar, nama_konsumen, berat, kategori, status, harga_satuan, harga_total) VALUES (NOW(), NOW() + INTERVAL 3 DAY, '$nama', $berat, '$kategori', 'Belum diambil', $harga, $total)");

        return mysqli_affected_rows($conn);
    }

    function ubah($data) {
        global $conn;

        $id = $data["id"];
        $nama = htmlspecialchars($data["nama_konsumen"]);
        $berat = $data["berat"];
        $kategori = htmlspecialchars($data["kategori"]);
        $harga = $data["harga"];
        $total = $berat * $harga;


        mysqli_query($conn, "UPDATE transaksi SET nama_konsumen = '$nama', berat = $berat, kategori = '$kategori', harga_satuan = $harga, harga_total = $total WHERE id = $id");

        return mysqli_affected_rows($conn);
    }

    function hapus($id) {
        global $conn;
        
        mysqli_query($conn, "DELETE FROM transaksi WHERE id = $id");

        return mysqli_affected_rows($conn);
    }
?>