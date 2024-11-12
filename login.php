<?php
session_start();
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['loggedin'] = true;
        $_SESSION['user'] = $user['email'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] == 'admin') {
            header("Location: dashboard2.php");
        } else {
            $redirect = isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php';
            header("Location: $redirect");
        }
        exit();
    } else {
        echo "Email atau password salah!";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom right, #000428, #004e92);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        .login-card {
            background-color: #1c1c1e;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5px);
        }

        .form-section {
            padding: 2rem;
        }

        .form-control {
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 10px;
            box-shadow: none;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            box-shadow: 0 0 15px rgba(128, 128, 255, 0.8);
            outline: none;
        }

        .btn-login {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            border: none;
            color: #fff;
            padding: 0.75rem;
            border-radius: 10px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-login:hover {
            background: linear-gradient(to right, #2575fc, #6a11cb);
            transform: translateY(-2px);
        }

        .link-group {
            display: flex;
            justify-content: space-between;
            margin-top: 1rem;
        }

        .register-link, .back-link {
            color: #fff; /* Explicit white color for better visibility */
            text-decoration: none;
            font-size: 1rem;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .register-link:hover, .back-link:hover {
            color: #a8a8a8;
            text-decoration: underline;
        }

        .image-section img {
            width: 100%;
            border-radius: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row login-card">
                    <div class="col-md-6 image-section">
                        <img src="blog-1.png" alt="Login Image">
                    </div>
                    <div class="col-md-6 form-section">
                        <h3 class="text-center">Login</h3>
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-login">Login</button>
                        </form>
                        <div class="link-group">
                            <a href="index.php" class="back-link">Back</a>
                            <a href="register.php" class="register-link">Register</a>
                            <a href="#" class="forgot-link" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal">Forgot Password?</a>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="forgotPasswordLabel">Forgot Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="forgot_password.php" method="post">
                    <div class="mb-3">
                        <label for="forgotEmail" class="form-label">Enter your email</label>
                        <input type="email" class="form-control" id="forgotEmail" name="forgotEmail" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Verification Email</button>
                </form>
            </div>
        </div>
    </div>
</div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>