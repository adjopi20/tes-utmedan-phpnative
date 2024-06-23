<?php
include_once 'database.php';

$database = new Database();
$stmt = $database->tampil();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <a href="simpan.php">Input Data</a>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Usia</th>
            <th>Opsi</th>
        </tr>
        <?php
        $no = 1;
        while ($row = $stmt->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$no++."</td>";
            echo "<td>".$row['nama']."</td>";
            echo "<td>".$row['alamat']."</td>";
            echo "<td>".$row['umur']."</td>";
            echo "<td><a href='hapus.php?id=".$row['id']."'>Hapus</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>


<?php
include_once 'database.php';

if($_POST){
    $database = new Database();
    $db = $database->koneksi_database();
    
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

