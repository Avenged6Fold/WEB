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

    // Handle image upload
    $gambar = '';
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $gambar = basename($_FILES['gambar']['name']);
        $target_dir = "uploads/";
        $target_file = $target_dir . $gambar;

        // Move the uploaded file to the target directory
        if (!move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
            die("Failed to upload image.");
        }
    }

    // Insert data into database
    $query = "INSERT INTO wisata (nama_wisata, alamat_wisata, deskripsi_wisata, operasional, harga_tiket, gambar) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$nama_wisata, $alamat_wisata, $deskripsi_wisata, $operasional, $harga_tiket, $gambar]);

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

    // Handle image upload
    $gambar = $_POST['existing_gambar']; // Default to existing image
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $gambar = basename($_FILES['gambar']['name']);
        $target_dir = "uploads/";
        $target_file = $target_dir . $gambar;

        // Move the uploaded file to the target directory
        if (!move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
            die("Failed to upload image.");
        }
    }

    // Update data in database
    $query = "UPDATE wisata SET nama_wisata = ?, alamat_wisata = ?, deskripsi_wisata = ?, operasional = ?, harga_tiket = ?, gambar = ? WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$nama_wisata, $alamat_wisata, $deskripsi_wisata, $operasional, $harga_tiket, $gambar, $id]);

    echo "1"; // Respond with success

} elseif ($aksi == 'delete_wisata') {
    // Handle delete wisata
    $id = $_GET['id'];
    
    // Optionally delete the image file from the server
    $query = "SELECT gambar FROM wisata WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $result = $stmt->fetch();
    if ($result && $result['gambar'] && file_exists("uploads/" . $result['gambar'])) {
        unlink("uploads/" . $result['gambar']);
    }

    // Delete the record from the database
    $query = "DELETE FROM wisata WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);

    header("Location: daftar_wisata.php");
}
?>
