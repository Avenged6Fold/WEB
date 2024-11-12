<?php
include 'db.php';
date_default_timezone_set('Asia/Jakarta'); // Ganti dengan zona waktu Anda


if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Periksa apakah token ada dan masih berlaku
    $stmt = $conn->prepare("SELECT * FROM users WHERE reset_token = ? AND token_expiry > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        // Token valid, tampilkan form ganti password
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

            // Update password baru dan hapus token
            $stmt = $conn->prepare("UPDATE users SET password = ?, reset_token = NULL, token_expiry = NULL WHERE id = ?");
            $stmt->bind_param("si", $new_password, $user['id']);
            $stmt->execute();

            echo "Password successfully reset!";
            exit();
        }
    } else {
        echo "Invalid or expired token!";
        exit();
    }
}
?>

<!-- Form Ganti Password -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Your Password</h2>
    <form action="" method="post">
        <div class="mb-3">
            <label for="new_password" class="form-label">New Password</label>
            <input type="password" class="form-control" id="new_password" name="new_password" required>
        </div>
        <button type="submit" class="btn btn-primary">Reset Password</button>
    </form>
</body>
</html>
