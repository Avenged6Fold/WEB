<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Your Email</title>
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
        h1 {
            font-size: 24px;
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
        <h1>Please Check Your Email</h1>
        <p>We have sent an email to your address for account verification. Please follow the instructions in the email to complete the verification process.</p>
        <a href="login.php" class="btn btn-teal w-100 mt-3">Back to Login</a>
    </div>
</body>
</html>
