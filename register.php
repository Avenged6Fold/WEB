<?php
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = 'admin';
    
    // Cek apakah email sudah ada
    $check_stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $result = $check_stmt->get_result();
    
    if ($result->num_rows > 0) {
        echo "Email sudah terdaftar!";
    } else {
        // Insert dengan kolom username
        $stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $password, $role);
        
        if ($stmt->execute()) {
            header("Location: login.php");
            exit;
        } else {
            echo "Gagal register, coba lagi!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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

        .register-card {
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

        .btn-register {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            border: none;
            color: #fff;
            padding: 0.75rem;
            border-radius: 10px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-register:hover {
            background: linear-gradient(to right, #2575fc, #6a11cb);
            transform: translateY(-2px);
        }

        .login-link {
            display: block;
            text-align: center;
            margin-top: 1rem;
            color: #a8a8a8;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .login-link:hover {
            color: #fff;
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
                <div class="row register-card">
                    <div class="col-md-6 image-section">
                        <img src="hero-img-1.png" alt="Register Image">
                    </div>
                    <div class="col-md-6 form-section">
                        <h3 class="text-center">Register</h3>
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-register">Register</button>
                            <a href="login.php" class="login-link">Already have an account? Login</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
