<?php 
    session_start();

    require 'functions.php';

    if(!isset($_SESSION["login"])) {
        header("Location: ../index.php");
        exit;
    }

    $id = $_GET["id"];
    
    if(hapus($id) > 0) {
        header("Location: hapus-sukses.php");
    }
    else {
        header("Location: hapus-gagal.php");
    }    
?>