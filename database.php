<?php
class Database {
    private $host = "localhost";
    private $username = "jopi";
    private $password = "123";
    private $database = "db_akademik";
    private $connection;


    #jalankan koneksi
    public function __construct() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
        
        if($this->connection->connect_error) {
            die("koneksi gagal: " . $this->connection->connect_error);
        }
    }

    #jalankan peritah query
    public function query($query) {
        return $this->connection->query($query);
    }

    public function tampil() {
        $query = "SELECT * FROM mahasiswa";
        return $this->query($query);
      
    }   

    public function simpan($nama, $alamat, $umur) {
        $query = "INSERT INTO mahasiswa (nama, alamat, umur) VALUES(?,?,?)";
        $stmt = $this->connection->prepare($query);

        $stmt->bind_Param("ssi", $nama, $alamat, $umur);
        return $stmt->execute();

        if($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function hapus($id) {
        $query = "DELETE FROM mahasiswa WHERE id=?";
        $stmt = $this->connection->prepare($query);

        $stmt->bind_Param("i", $id);

        if($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    # tutup koneksi
    public function close(){
        $this->connection->close();
    }
}
?>