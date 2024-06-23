<?php
include_once 'database.php';

if(isset($_GET['id'])){
    $database = new Database();
    
    $id = $_GET['id'];

    if($database->hapus($id)){
        echo "Data berhasil dihapus!";
    } else {
        echo "Data gagal dihapus!";
    }
}
header("Location: tampil.php");
?>