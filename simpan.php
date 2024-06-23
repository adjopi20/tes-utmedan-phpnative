<?php
include_once 'database.php';

if($_POST){
    $database = new Database();
    
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $umur = $_POST['umur'];

    if($database->simpan($nama, $alamat, $umur)){
        echo "Data berhasil disimpan!";
    } else {
        echo "Data gagal disimpan!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Input Data Mahasiswa</title>
</head>
<body>
    <h1>Input Data Mahasiswa</h1>
    <form action="simpan.php" method="post">
        <label>Nama:</label><br>
        <input type="text" name="nama"><br>
        <label>Alamat:</label><br>
        <input type="text" name="alamat"><br>
        <label>Umur:</label><br>
        <input type="text" name="umur"><br><br>
        <input type="submit" value="Simpan">
    </form>
    <a href="tampil.php">Kembali ke Data Mahasiswa</a>
</body>
</html>