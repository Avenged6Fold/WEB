<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Liburin Aja</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<link href="css/style.css" rel="stylesheet" type="text/css">
  <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

        :root {
            --primary-color: #3498db;
            --secondary-color: #2ecc71;
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

        /* Header Styles */
        header {
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: #08959A;
        }

        .nav-links {
            display: flex;
            list-style: none;
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
            color: #08959A;
        }

        /* Hero Section Styles */
        .hero {
            position: relative;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-align: center;
            overflow: hidden;
        }

        .hero video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1; /* Make sure video stays behind content */
        }

        .hero-content {
            position: relative;
            z-index: 1; /* Keep the text above the video */
            max-width: 800px;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 1s forwards 0.5s;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 1s forwards 0.7s;
        }

        .btn {
            display: inline-block;
            padding: 0.8rem 2rem;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 1s forwards 0.9s;
        }

        .btn:hover {
            background-color: #08959A;
        }

        /* Covid Data Section Styles */
        .covid-data {
            padding: 4rem 0;
            background-color: #fff;
        }

        .section-title {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-title h2 {
            font-size: 2.5rem;
            color:black;
            margin-bottom: 0.5rem;
        }

        .covid-cards {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .covid-card {
            flex-basis: calc(25% - 1rem);
            background-color: #009ee5;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            margin-bottom: 1rem;
            transition: transform 0.3s ease;
        }

        .covid-card:hover {
            transform: translateY(-5px);
        }

        .covid-card h3 {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }

        .covid-card p {
            font-size: 2rem;
            font-weight: 700;
            color: #fff;
        }

        /* Popular Destinations Styles */
        .popular-destinations {
            padding: 4rem 0;
            background-color: #f9f9f9;
        }

        .destinations-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .destination-card {
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .destination-card:hover {
            transform: translateY(-5px);
        }

        .destination-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .destination-info {
            padding: 1.5rem;
        }

        .destination-info h3 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            color: #009ee5;
        }

        .destination-info p {
            margin-bottom: 1rem;
            color: #333;
        }

        /* Footer Styles */
        footer {
            background-color: #333;
            color: #fff;
            padding: 3rem 0;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .footer-section {
            flex-basis: calc(33.333% - 2rem);
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .footer-section p {
            margin-bottom: 1rem;
        }

        .social-icons a {
            color: #fff;
            font-size: 1.5rem;
            margin-right: 1rem;
            transition: color 0.3s ease;
        }

        .fa-facebook {
            color: #1877F2;
        }

        .fa-youtube {
            color: #FF0000;
        }

        .fa-instagram {
            background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .social-icons a:hover {
            color: var(--primary-color);
        }

        .footer-bottom {
            text-align: center;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .swal2-confirm {
                margin-right: 10px; /* Menambahkan jarak antara tombol "Login" dan "Batal" */
            }

        /* Animations */
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }

            .hero p {
                font-size: 1rem;
            }

            .covid-card {
                flex-basis: calc(50% - 1rem);
            }

            .footer-section {
                flex-basis: 100%;
            }
            .logout-link {
             margin-left: auto; /* Posisikan logout di kanan */
            }
        }
    </style>

	<script src="https://use.fontawesome.com/89b8dcd205.js"></script>
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
                    <li><a href="destinasi-jabar.php">Daftar Wisata</a></li>
                    <li><a href="contact_us.php">Contact</a></li>
                <?php endif; ?>
            </ul>


        </nav>
    </header>
	<!-- contact section -->
    <section id="contact-sections" style="padding-top: 80px;">
  <div class="container-md">
    <div class="section-title text-center">
      <h2 class="header-title">Contact Us</h2>
    </div>
    <p class="header-text">
      Selamat datang di SiJeli, web mengenai informasi wisata Jember.
      Jika Anda memiliki pertanyaan, kerjasama dan review. Hubungi kami
      melalui Contact Form dibawah:
    </p>
    <div class="contact-form mt-2">
      <!-- First grid -->
      <div class="first-grid col-lg-4 col-md-12 col-sm-12">
        <div>
          <i class="fa fa-map-marker"></i><span class="form-info"> Jember, Indonesia</span><br />
          <i class="fa fa-phone"></i><span class="form-info"> 081237832005</span><br />
          <i class="fa fa-envelope"></i><span class="form-info"> fhanwam@gmail.com</span>
        </div>
      </div>
      <!-- Second grid -->
      <div class="second-grid col-lg-8 col-md-12 col-sm-12">
      <form action="send_email.php" method="POST">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text text"><i class="fa fa-user" aria-hidden="true"></i></span>
        </div>
        <input type="text" name="name" placeholder="Name" aria-label="Name" required>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
        </div>
        <input type="email" name="email" placeholder="Email" aria-label="Email" required>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text text"><i class="fa fa-pencil" aria-hidden="true"></i></span>
        </div>
        <input type="text" name="subject" placeholder="Subject of this message" required>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-pencil-square" aria-hidden="true"></i></span>
        </div>
        <textarea class="message" name="message" placeholder="Message" rows="5" aria-label="With textarea" required></textarea>
    </div>
    <br />
    <button type="submit" class="submit btn-send btn btn-primary">Send</button>
</form>

      </div>
    </div>
  </div>
</section>


	<!-- Section Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Tentang Kami</h3>
                    <p>Platform pemesanan tiket wisata di daerah jember yang memudahkan anda yang ingin berwisata tanpa ribet. Jangan Lupa Liburan!</p>
                </div>
                <div class="footer-section">
                    <!-- <h3>Menu</h3>
                    <ul>
                        <li><a href="#">Tips</a></li>
                        <li><a href="#">Daftar Wisata</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul> -->
                </div>
                <div class="footer-section">
                    <h3>Ikuti Kami</h3>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <!-- <a href="#"><i class="fab fa-twitter"></i></a> -->
                        <a href="https://www.instagram.com/jember_liburan"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 Jember Liburan. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Sticky header
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            header.classList.toggle('sticky', window.scrollY > 0);
        });

        // Fetch and display COVID-19 data
        async function fetchCovidData() {
            try {
                const response = await fetch('https://api.kawalcorona.com/indonesia/');
                const data = await response.json();
                document.getElementById('positif').textContent = data[0].positif;
                document.getElementById('sembuh').textContent = data[0].sembuh;
                document.getElementById('meninggal').textContent = data[0].meninggal;
                document.getElementById('dirawat').textContent = data[0].dirawat;
            } catch (error) {
                console.error('Error fetching COVID-19 data:', error);
            }
        }

        // Call fetchCovidData function when the page loads
        window.addEventListener('load', fetchCovidData);
    </script>

<script>
       function checkLogin() {
    // Cek apakah pengguna sudah login
    var loggedIn = "<?php echo isset($_SESSION['loggedin']) && $_SESSION['loggedin'] ? 'true' : 'false'; ?>";

    if (loggedIn === 'false') {
        // Menampilkan SweetAlert2 dengan tombol Cancel dan Konfirmasi
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
</body>
</html>