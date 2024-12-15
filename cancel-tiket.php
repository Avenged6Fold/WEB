<?php
include 'db.php';

// Pastikan order_id dikirim melalui URL
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // Update status tiket menjadi "Dibatalkan" (transaction_status = 0)
    $sql = "UPDATE pemesanan SET transaction_status = 0 WHERE order_id = '$order_id'";
    if (mysqli_query($conn, $sql)) {
        // Redirect kembali ke halaman tiket dengan pesan sukses
        header("Location: tiket.php?status=success");
    } else {
        // Redirect kembali ke halaman tiket dengan pesan gagal
        header("Location: tiket.php?status=error");
    }
} else {
    die("Invalid request.");
}
?>
