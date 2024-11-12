<?php
include 'db.php';
date_default_timezone_set('Asia/Jakarta'); // Ganti dengan zona waktu Anda


// Include PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['forgotEmail'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        $token = bin2hex(random_bytes(50));
        $expiry = date("Y-m-d H:i:s", strtotime('+2 hour'));

        $stmt = $conn->prepare("UPDATE users SET reset_token = ?, token_expiry = ? WHERE email = ?");
        $stmt->bind_param("sss", $token, $expiry, $email);
        $stmt->execute();

        $resetLink = "localhost/web-projek/verify_reset.php?token=" . $token;

        // Konfigurasi PHPMailer
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Gunakan Gmail atau SMTP lain
            $mail->SMTPAuth = true;
            $mail->Username = 'fhanwam@gmail.com'; // Ganti dengan email Anda
            $mail->Password = 'bbqa pnvt fniz phts'; // Ganti dengan password email
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('fhanwam@gmail.com', 'SiJeli');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';
            $mail->Body = "Click the following link to reset your password: <a href='$resetLink'>$resetLink</a>";

            $mail->send();
            echo "Please check your email to verify and reset your password.";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Email not found!";
    }
}

?>
