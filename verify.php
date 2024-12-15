<?php
include 'db.php';

$notification = ""; // Variabel untuk menyimpan notifikasi

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Siapkan query untuk memverifikasi token
    $stmt = $pdo->prepare("SELECT * FROM users WHERE reset_token = :token AND is_verified = 0");
    $stmt->bindParam(':token', $token);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Token valid, update status verifikasi
        $stmt_update = $pdo->prepare("UPDATE users SET is_verified = 1, reset_token = NULL WHERE reset_token = :token");
        $stmt_update->bindParam(':token', $token);
        if ($stmt_update->execute()) {
            $notification = "Akun Anda berhasil diverifikasi!";
        } else {
            $notification = "Gagal memperbarui status verifikasi.";
        }
    } else {
        $notification = "Token tidak valid atau sudah diverifikasi.";
    }
} else {
    $notification = "Token tidak ditemukan.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Verification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e0f2f1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .title {
            font-size: 36px;
            font-weight: bold;
            color: #00796b;
            margin-bottom: 20px;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 400px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            color: #00796b;
            margin-bottom: 20px;
        }
        .btn-teal {
            background-color: #00796b;
            color: #ffffff;
            border: none;
        }
        .btn-teal:hover {
            background-color: #004d40;
        }
    </style>
</head>
<body>
    <div class="title">SiJeli</div>
    <div class="container">
        <h2>Account Verification</h2>
        <p><?php echo htmlspecialchars($notification); ?></p>
        <a href="login.php" class="btn btn-teal w-100">Go to Login</a>
    </div>
</body>
</html>
