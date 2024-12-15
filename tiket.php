<?php
include 'db.php';
session_start();


$email = mysqli_real_escape_string($conn, $_SESSION['user']);
$sql = "SELECT order_id, destinasi, email, tanggal_kunjungan, jumlah_tiket, transaction_status, total_bayar
        FROM pemesanan 
        WHERE email = '$email'
        ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {

  $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
  die("Tidak Ada Riwayat Pemesanan");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Tiket</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

    :root {
      --primary-color: #08959A;
      --secondary-color: #08959A;
      --text-color: #fff;
      --bg-color: #f4f4f4;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      line-height: 1.6;
      color: var(--text-color);
      background-color: var(--bg-color);
    }

    .container {
      width: 90%;
      max-width: 1200px;
      margin: 0 auto;
    }

    header {
      background-color: #fff;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
      padding: 0.5rem 1rem;
      transition: all 0.3s ease;
    }

    nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem 0;
      width: 90%;
      max-width: 1200px;
      margin: 0 auto;
    }

    .logo {
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--primary-color);
    }

    .nav-links {
      display: flex;
      list-style: none;
      margin: 0;
      padding: 0;
    }

    .nav-links li {
      margin-left: 2rem;
    }

    .nav-links a {
      text-decoration: none;
      color: #333;
      font-weight: 600;
      transition: color 0.3s ease;
    }

    .nav-links a:hover {
      color: #3498db;
    }

    .card {
      max-width: 410px;
      margin: 7rem auto 3rem;
      border-radius: 15px;
    }

    .card-header {
      background-color: #08959A;
      color: #fff;
      border-radius: 15px 15px 0 0;
      padding: 10px;
      text-align: center;
      font-weight: bold;
    }

    .card-footer {
      border-radius: 0 0 15px 15px;
    }
  </style>
</head>

<body>
  <header>
    <nav class="container">
      <div class="logo">Jeli</div>
      <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
          <li><a href="pesan.php">Pesan Tiket</a></li>
          <li><a href="tiket.php">Riwayat Tiket</a></li>
          <li><a href="destinasi-jabar.php">Daftar Wisata</a></li>
          <li><a href="contact_us.php">Contact</a></li>
          <div class="logout-link">
            <li><a href="logout.php">Logout</a></li>
          </div>
        <?php else: ?>
          <li><a href="#" onclick="checkLogin()">Pesan Tiket</a></li>
          <li><a href="tiket.php">Riwayat Tiket</a></li>
          <li><a href="destinasi-jabar.php">Daftar Wisata</a></li>
          <li><a href="contact_us.php">Contact</a></li>
          <li><a href="logout.php">Logout</a></li>

        <?php endif; ?>
      </ul>
    </nav>
  </header>

  <div class="container mt-5">
    <?php
    if (isset($_GET['status'])) {
      if ($_GET['status'] == 'success') {
        echo '<script>Swal.fire("Sukses", "Tiket berhasil dibatalkan.", "success");</script>';
      } elseif ($_GET['status'] == 'error') {
        echo '<script>Swal.fire("Error", "Terjadi kesalahan saat membatalkan tiket.", "error");</script>';
      }
    }
    ?>
    <?php if (is_array($data) && count($data) > 0): ?>
      <?php foreach ($data as $item): ?>
        <div class="card shadow-lg mb-4">
          <div class="card-header bg-primary text-white text-center">
            <h3 class="mb-0">E-Tiket</h3>
          </div>
          <div class="card-body">
            <h5 class="text-primary mb-3">Detail Tiket</h5>
            <table class="table">
              <tr>
                <th>Order ID</th>
                <td>: <?php echo $item['order_id']; ?></td>
              </tr>
              <tr>
                <th>Destinasi</th>
                <td>: <?php echo $item['destinasi']; ?></td>
              </tr>
              <tr>
                <th>Email</th>
                <td>: <?php echo $item['email']; ?></td>
              </tr>
              <tr>
                <th>Tanggal Kunjungan</th>
                <td>: <?php echo $item['tanggal_kunjungan']; ?></td>
              </tr>
              <tr>
                <th>Jumlah Tiket</th>
                <td>: <?php echo $item['jumlah_tiket']; ?> Orang</td>
              </tr>
              <tr>
                <th>Total Bayar</th>
                <td>: <?php echo $item['total_bayar']; ?></td>
              </tr>
              <tr>
                <th>Status Tiket</th>
                <td>:
                  <?php
                  if (isset($item['transaction_status'])) {  // Memeriksa apakah 'transaction_status' ada
                    if ($item['transaction_status'] == 3) {
                      echo "Pembayaran Sukses";
                    } elseif ($item['transaction_status'] == 2) {
                      echo "Pembayaran Pending";
                    } elseif ($item['transaction_status'] == 0) {
                      echo "Dibatalkan";
                    } else {
                      echo "Belum Dibayar";
                    }
                  } else {
                    echo "Status tidak tersedia";  // Jika 'transaction_status' tidak ada
                  }
                  ?>
                </td>
              </tr>
            </table>
          </div>
          <div class="card-footer text-center">
            <?php if ($item['transaction_status'] == 1): ?>
              <a href='./midtrans/examples/snap/checkout-process-simple-version.php?order_id=<?php echo $item['order_id']; ?>' class="btn btn-danger">Bayar Sekarang</a>
              <a href="cancel-tiket.php?order_id=<?php echo $item['order_id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin membatalkan tiket ini?')">Batalkan Tiket</a>
            <?php elseif ($item['transaction_status'] != 0): ?>
              <a href="download-pdf.php" class="btn btn-success"><i class="bi bi-file-pdf"></i> Download Tiket</a>
            <?php endif; ?>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p>Data tidak ditemukan.</p>
    <?php endif; ?>
  </div>

  <script>
    function checkLogin() {
      // Cek apakah pengguna sudah login
      var loggedIn = "<?php echo isset($_SESSION['loggedin']) && $_SESSION['loggedin'] ? 'true' : 'false'; ?>";

      if (loggedIn === 'false') {

        Swal.fire({
          title: 'Anda belum login!',
          text: 'Anda harus login terlebih dahulu untuk memesan tiket!',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Login',
          cancelButtonText: 'Batal',
          customClass: {
            confirmButton: 'swal2-confirm btn btn-primary',
            cancelButton: 'swal2-cancel btn btn-secondary'
          },
          buttonsStyling: false
        }).then((result) => {
          if (result.isConfirmed) {
            // Redirect ke halaman login dengan parameter redirect
            window.location.href = "login.php?redirect=index.php";
          }
        });
      }
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>