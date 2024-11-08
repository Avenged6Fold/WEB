<?php
include 'db.php';

$aksi = $_GET['aksi'] ?? '';

if ($aksi == 'tambah_wisata') {
    // Handle add wisata
    $nama_wisata = $_POST['nama_wisata'];
    $alamat_wisata = $_POST['alamat_wisata'];
    $deskripsi_wisata = $_POST['deskripsi_wisata'];
    $operasional = $_POST['operasional'];
    $harga_tiket = $_POST['harga_tiket'];

    $query = "INSERT INTO wisata (nama_wisata, alamat_wisata, deskripsi_wisata, operasional, harga_tiket) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$nama_wisata, $alamat_wisata, $deskripsi_wisata, $operasional, $harga_tiket]);

    header("Location: daftar_wisata.php");

} elseif ($aksi == 'edit_data_wisata') {
    // Handle fetch single wisata data for editing
    $id = $_GET['id'];
    $query = "SELECT * FROM wisata WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    echo json_encode($stmt->fetch());

} elseif ($aksi == 'update_wisata') {
    // Handle update wisata
    $id = $_POST['id'];
    $nama_wisata = $_POST['nama_wisata'];
    $alamat_wisata = $_POST['alamat_wisata'];
    $deskripsi_wisata = $_POST['deskripsi_wisata'];
    $operasional = $_POST['operasional'];
    $harga_tiket = $_POST['harga_tiket'];

    $query = "UPDATE wisata SET nama_wisata = ?, alamat_wisata = ?, deskripsi_wisata = ?, operasional = ?, harga_tiket = ? WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$nama_wisata, $alamat_wisata, $deskripsi_wisata, $operasional, $harga_tiket, $id]);

    echo "1"; // Respond with success

} elseif ($aksi == 'delete_wisata') {
    // Handle delete wisata
    $id = $_GET['id'];
    $query = "DELETE FROM wisata WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);

    header("Location: daftar_wisata.php");
}
?>
