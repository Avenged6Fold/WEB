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
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<script src="https://use.fontawesome.com/89b8dcd205.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="js/script.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
			padding-top: 70px; /* Sesuaikan dengan tinggi navbar */
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
			top: 0;
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
			color: #3498db;
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
            background-color: #2980b9;
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
            margin-bottom: 2rem;
            text-align: center;
        }

        .destination-card:hover {
            transform: translateY(-5px);
        }

        .destination-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-bottom: 1px solid #ddd;
        }

        .destination-info {
            padding: 1rem;
        }

        .destination-info h5 {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
            color: #333;
        }

        .destination-info p {
            color: #777;
            margin-bottom: 0.5rem;
        }

        .btn-detail {
            display: inline-block;
            padding: 0.5rem 1rem;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-detail:hover {
            background-color: #2980b9;
        }

        .card img {
            width: 100%; /* Pastikan gambar menyesuaikan lebar container */
            height: 500px; /* Atur tinggi tetap */
            object-fit: cover; /* Memotong gambar jika rasio berbeda */
            border-bottom: 1px solid #ddd;
            border-radius: 10px 10px 0 0; /* Membuat sudut atas melengkung */
        }

        .card-body {
            color: #000; /* Warna teks hitam untuk seluruh teks di dalam card */
            text-align: left; /* Rata kiri untuk teks */
        }

        /* Button Text */
        .btn {
            color: #fff !important; /* Warna teks tombol tetap putih */
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

        .social-icons a:hover {
            color: var(--primary-color);
        }

        .footer-bottom {
            text-align: center;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        .search-container {
        margin-bottom: 2rem;
    }

    #searchInput {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    #searchInput:focus {
        outline: none;
        border-color: #3498db;
        box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
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
			.nav-links {
			gap: 1rem;
			}
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
</head>
	<body>
	<!-- Navbar -->
	<header>
        <nav class="container">
            <div class="logo">Jeli</div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
                    <li><a href="pesan.php">Pesan Tiket</a></li>
                    <li><a href="destinasi-jabar.php">Daftar Wisata</a></li>
                    <li><a href="#">Contact</a></li>
                    <div class="logout-link">
                        <li><a href="logout.php">Logout</a></li>
                    </div>
                <?php else: ?>
                    <li><a href="#" onclick="checkLogin()">Pesan Tiket</a></li>
                    <li><a href="destinasi-jabar.php">Daftar Wisata</a></li>
                    <li><a href="#">Contact</a></li>
                <?php endif; ?>
            </ul>


        </nav>
    </header>

	<div class="container">
		<div class="row mb-4 pt-4">
			<div class="col-12">
			<h1 class="text-center" style="color: #000000;">Pencarian Destinasi</h1>
            <div class="container">
    <div class="search-bar">
        <input type="text" id="search-input" class="form-control" placeholder="Cari wisata...">
        <button id="search-button" class="btn btn-primary mt-2">Cari</button>
    </div>

    <div id="result-container" class="mt-4">
        <!-- Hasil pencarian akan dimuat di sini -->
    </div>
</div>

			</div>
		</div>
	</div>
    

	<!-- Content -->
	<div class="container space">
    <div class="row" id="location">
        <!-- Hasil pencarian destinasi akan ditampilkan di sini -->
    </div>
</div>


	<!-- Section Footer -->
	<div class="footer text-white">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-4 col-md-6 col-sm-12">
					<h2>Liburin Aja</h2>
					<p class="p-footer">Platform wisata dan komunitas dengan beragam tips liburan, dan kuliner sepulau jawa. Jangan lupa Subscribe & Like agar kamu terupdate. Jangan Lupa Liburan!</p>
					<div class="container">
						<div class="row pt-4">
							<div class="col-12">
								<p class="content display-5">Share :</p>
							</div>
							<div class="col-12 social">
								<a href="#"><i class="fab fa-facebook"></i></a>
								<a href="#"><i class="fab fa-twitter"></i></a>
								<a href="#"><i class="fab fa-whatsapp"></i></a>
								<a href="#"><i class="fab fa-instagram"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12" style="margin-bottom: 15px;">
							<h2>Menu</h2>
							<ul>
								<li class="footer-item">
					                <a class="footer-link text-white" href="#">Tips</a>
					            </li>
					            <li class="footer-item">
					                <a class="footer-link text-white" href="#">Kuliner</a>
					            </li> 
					            <li class="footer-item">
					                <a class="footer-link text-white" href="#">Contact Us</a>
					            </li>
							</ul>
						</div>
						<div class="col-lg6 col-md-6 col-sm-12">
							<h2>Let's Connect</h2>
							<ul>
								<li class="footer-socmed">
					                <a class="footer-link text-white" href="#"><ion-icon name="logo-facebook"></ion-icon> Instagram</a>
					            </li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-12">
					<p class="text-center">
						© 2020 <a href="" class="copyright text-white">liburinaja.com</a> - All Rights Reserved | <a href="" class="copyright text-white">Privacy Policy</a><a href="" class="copyright text-white">Contact</a> | <a href="" class="copyright text-white">Renew/Change Cookie Consent</a>
					</p>
				</div>
			</div>
		</div>
	</div>

	<script>
		// $(document).ready(function(){
		// 	destinasiJabar();
		// })
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

        $(document).ready(function () {
    $('#search-button').on('click', function () {
        const search = $('#search-input').val();

        $.ajax({
            url: 'fetch_wisata.php',
            method: 'GET',
            data: { search: search },
            dataType: 'json',
            success: function (data) {
    let content = '';

    if (data.length > 0) {
        data.forEach(function (item) {
            content += `
                <div class="card mb-3">
                    <img src="uploads/${item.gambar}" class="card-img-top" alt="${item.nama_wisata}">
                    <div class="card-body">
                        <h5 class="card-title">${item.nama_wisata}</h5>
                        <p class="card-text"><strong>Alamat:</strong> ${item.alamat_wisata}</p>
                        <p class="card-text">${item.deskripsi_wisata}</p>
                        <p class="card-text"><strong>Operasional:</strong> ${item.operasional}</p>
                        <p class="card-text"><strong>Harga Tiket:</strong> Rp${item.harga_tiket}</p>
                        <a href="#" class="btn btn-primary">Baca lebih lanjut</a>
                    </div>
                </div>
            `;
        });
    } else {
        content = '<p>Data tidak ditemukan.</p>';
    }

    $('#result-container').html(content);
},


            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
});


    </script>

    <script>
        function checkLogin() {
            // Cek apakah pengguna sudah login
            var loggedIn = "<?php echo isset($_SESSION['loggedin']) && $_SESSION['loggedin'] ? 'true' : 'false'; ?>";

            if (loggedIn === 'false') {
                alert("Anda harus login terlebih dahulu untuk memesan tiket!");
                // Redirect ke halaman login dengan parameter redirect
                window.location.href = "login.php?redirect=index.php";
            } 
        } 
	</script>
</body>
</html>