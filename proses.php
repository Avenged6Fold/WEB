<?php
include 'db.php';

<<<<<<< HEAD
if(isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];

    switch($aksi) {
        case 'add':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if(empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])) {
                    die("Username, email, dan password harus diisi!");
                }

                $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
=======
if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];

    switch ($aksi) {
        case 'add':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                $password = $_POST['password'];
                $role = $_POST['role'];

                // Validasi input
                if (empty($username) || empty($email) || empty($password)) {
                    die("Username, email, dan password harus diisi!");
                }

>>>>>>> a6d1d7fb59b49c614209c67b9cee60e1e520f41d
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    die("Format email tidak valid!");
                }

<<<<<<< HEAD
                $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ? OR username = ?");
                $stmt->execute([$email, $username]);
                if($stmt->fetchColumn() > 0) {
                    die("Email atau username sudah terdaftar!");
                }

                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $role = $_POST['role'];
                
                try {
                    $stmt = $pdo->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$username, $email, $password, $role]);
                    header('Location: dashboard2.php?status=success&message=Data berhasil ditambahkan');
                    exit;
                } catch(PDOException $e) {
=======
                try {
                    // Cek apakah username atau email sudah ada
                    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ? OR username = ?");
                    $stmt->execute([$email, $username]);

                    if ($stmt->fetchColumn() > 0) {
                        die("Email atau username sudah terdaftar!");
                    }

                    // Hash password dan simpan data ke database
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $pdo->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$username, $email, $hashedPassword, $role]);

                    header('Location: dashboard2.php?status=success&message=Data berhasil ditambahkan');
                    exit;
                } catch (PDOException $e) {
>>>>>>> a6d1d7fb59b49c614209c67b9cee60e1e520f41d
                    header('Location: dashboard2.php?status=error&message=Gagal menambahkan data');
                    exit;
                }
            }
            break;

        case 'edit':
<<<<<<< HEAD
            if(isset($_GET['id'])) {
                $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
                
                try {
                    $stmt = $pdo->prepare("SELECT id, username, email, role FROM users WHERE id = ?");
                    $stmt->execute([$id]);
                    $data = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                    if($data) {
=======
            if (isset($_GET['id'])) {
                $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

                try {
                    $stmt = $pdo->prepare("SELECT id, username, email, role FROM users WHERE id = ?");
                    $stmt->execute([$id]);

                    $data = $stmt->fetch(PDO::FETCH_ASSOC);
                    if ($data) {
>>>>>>> a6d1d7fb59b49c614209c67b9cee60e1e520f41d
                        echo json_encode($data);
                    } else {
                        echo json_encode(['error' => 'Data tidak ditemukan']);
                    }
<<<<<<< HEAD
                } catch(PDOException $e) {
=======
                } catch (PDOException $e) {
>>>>>>> a6d1d7fb59b49c614209c67b9cee60e1e520f41d
                    echo json_encode(['error' => 'Terjadi kesalahan']);
                }
                exit;
            }
            break;

        case 'update':
<<<<<<< HEAD
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
=======
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
>>>>>>> a6d1d7fb59b49c614209c67b9cee60e1e520f41d
                $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
                $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                $role = $_POST['role'];
<<<<<<< HEAD

=======
                $password = $_POST['password'];

                // Validasi email
>>>>>>> a6d1d7fb59b49c614209c67b9cee60e1e520f41d
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo json_encode(['error' => 'Format email tidak valid']);
                    exit;
                }

                try {
<<<<<<< HEAD
                    if (!empty($_POST['password'])) {
                        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                        $stmt = $pdo->prepare("UPDATE users SET username = ?, email = ?, password = ?, role = ? WHERE id = ?");
                        $stmt->execute([$username, $email, $password, $role, $id]);
=======
                    // Update data
                    if (!empty($password)) {
                        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                        $stmt = $pdo->prepare("UPDATE users SET username = ?, email = ?, password = ?, role = ? WHERE id = ?");
                        $stmt->execute([$username, $email, $hashedPassword, $role, $id]);
>>>>>>> a6d1d7fb59b49c614209c67b9cee60e1e520f41d
                    } else {
                        $stmt = $pdo->prepare("UPDATE users SET username = ?, email = ?, role = ? WHERE id = ?");
                        $stmt->execute([$username, $email, $role, $id]);
                    }
<<<<<<< HEAD
                    echo json_encode(['success' => 'Data berhasil diupdate']);
                } catch(PDOException $e) {
=======

                    echo json_encode(['success' => 'Data berhasil diupdate']);
                } catch (PDOException $e) {
>>>>>>> a6d1d7fb59b49c614209c67b9cee60e1e520f41d
                    echo json_encode(['error' => 'Gagal mengupdate data']);
                }
                exit;
            }
            break;

        case 'delete':
<<<<<<< HEAD
            if(isset($_GET['id'])) {
                $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
                
                try {
                    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ? AND role='admin'");
                    $stmt->execute([$id]);
                    header('Location: dashboard2.php?status=success&message=Data berhasil dihapus');
                    exit;
                } catch(PDOException $e) {
=======
            if (isset($_GET['id'])) {
                $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

                try {
                    // Hapus data dengan role admin saja
                    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ? AND role = 'admin'");
                    $stmt->execute([$id]);

                    header('Location: dashboard2.php?status=success&message=Data berhasil dihapus');
                    exit;
                } catch (PDOException $e) {
>>>>>>> a6d1d7fb59b49c614209c67b9cee60e1e520f41d
                    header('Location: dashboard2.php?status=error&message=Gagal menghapus data');
                    exit;
                }
            }
            break;

        default:
            header('Location: dashboard2.php');
            exit;
    }
} else {
    header('Location: dashboard2.php');
    exit;
}
<<<<<<< HEAD
?>
=======
>>>>>>> a6d1d7fb59b49c614209c67b9cee60e1e520f41d
