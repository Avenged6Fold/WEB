<?php
include 'db.php';

$aksi = $_GET['aksi'];

// Proses Tambah Data Wisata
if($aksi == "tambah_wisata"){
    try {
        $nama_wisata = $_POST['nama_wisata'];
        $deskripsi_wisata = $_POST['deskripsi_wisata'];
        $alamat_wisata = $_POST['alamat_wisata'];
        $harga_tiket = $_POST['harga_tiket'];
        
        $query = "INSERT INTO daftar_wisata (nama_wisata, deskripsi_wisata, alamat_wisata, harga_tiket) 
                  VALUES (:nama_wisata, :deskripsi_wisata, :alamat_wisata, :harga_tiket)";
        
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':nama_wisata' => $nama_wisata,
            ':deskripsi_wisata' => $deskripsi_wisata,
            ':alamat_wisata' => $alamat_wisata,
            ':harga_tiket' => $harga_tiket
        ]);
        
        header("location:guru.php");
    } catch(PDOException $e) {
        echo "Gagal menambahkan data: " . $e->getMessage();
    }
}

// Proses Edit Data Wisata (mengambil data untuk form edit)
else if($aksi == "edit_data_wisata"){
    try {
        $id_wisata = $_GET['id_wisata'];
        
        $query = "SELECT * FROM daftar_wisata WHERE id_wisata = :id_wisata";
        $stmt = $pdo->prepare($query);
        $stmt->execute([':id_wisata' => $id_wisata]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        
        echo json_encode($data);
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Proses Update Data Wisata
else if($aksi == "update_wisata"){
    try {
        $id_wisata = $_POST['id_wisata'];
        $nama_wisata = $_POST['nama_wisata'];
        $deskripsi_wisata = $_POST['deskripsi_wisata'];
        $alamat_wisata = $_POST['alamat_wisata'];
        $harga_tiket = $_POST['harga_tiket'];
        
        $query = "UPDATE daftar_wisata 
                  SET nama_wisata = :nama_wisata,
                      deskripsi_wisata = :deskripsi_wisata,
                      alamat_wisata = :alamat_wisata,
                      harga_tiket = :harga_tiket
                  WHERE id_wisata = :id_wisata";
        
        $stmt = $pdo->prepare($query);
        $result = $stmt->execute([
            ':id_wisata' => $id_wisata,
            ':nama_wisata' => $nama_wisata,
            ':deskripsi_wisata' => $deskripsi_wisata,
            ':alamat_wisata' => $alamat_wisata,
            ':harga_tiket' => $harga_tiket
        ]);
        
        echo $result ? "1" : "0";
    } catch(PDOException $e) {
        echo "0";
    }
}

// Proses Delete Data Wisata
else if($aksi == "delete_wisata"){
    try {
        $id_wisata = $_GET['id_wisata'];
        
        $query = "DELETE FROM daftar_wisata WHERE id_wisata = :id_wisata";
        $stmt = $pdo->prepare($query);
        $stmt->execute([':id_wisata' => $id_wisata]);
        
        header("location:guru.php");
    } catch(PDOException $e) {
        echo "Gagal menghapus data: " . $e->getMessage();
    }
}
?>