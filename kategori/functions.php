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

        $nama = htmlspecialchars($data["nama_kategori"]);
        $tarif = htmlspecialchars($data["tarif"]);


        mysqli_query($conn, "INSERT INTO kategori(nama, tarif) VALUES ('$nama', '$tarif')");

        return mysqli_affected_rows($conn);
    }

    function ubah($data) {
        global $conn;

        $id = $data["id"];
        $nama = htmlspecialchars($data["nama_kategori"]);
        $tarif = htmlspecialchars($data["tarif"]);


        mysqli_query($conn, "UPDATE kategori SET nama = '$nama', tarif = '$tarif' WHERE id = $id");

        return mysqli_affected_rows($conn);
    }

    function hapus($id) {
        global $conn;
        
        mysqli_query($conn, "DELETE FROM kategori WHERE id = $id");

        return mysqli_affected_rows($conn);
    }
?>