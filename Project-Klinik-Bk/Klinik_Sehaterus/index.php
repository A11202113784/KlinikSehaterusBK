<?php
if (!isset($_SESSION)) {
  session_start();
}

include_once("koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8 ">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Klinik Sehaterus.Home</title>
  <link rel="stylesheet" href="css/index.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    body {
      background-color: #E0FFFF;
    }

    nav.navbar {
  background-color: #20b2aa; /* Warna latar belakang biru kehijauan */
  border-bottom: 1px solid #fff; 
  box-shadow: 2px 4px 8px -2px rgba(0, 0, 0, 0.2); 
  border-radius: 80px; 
  padding: 10px 20px; 
  font-family: 'Helvetica Neue', Arial, sans-serif; 
  color: #fff; 
  text-align: center; 
  transition: all 0.3s ease; 
  display: flex;
  justify-content: space-evenly; /* Membuat tombol memiliki jarak merata */
  align-items: center;
  flex-wrap: wrap; /* Membiarkan tombol berpindah ke bawah jika diperlukan */
}

/* Styling tombol */
nav.navbar a {
  color: #fff;
  text-decoration: none;
  padding: 1px 20px; /* Tambahkan padding yang seragam untuk setiap tombol */
  margin:1px; /* Beri margin agar rapi */
  border-radius: 1px; 
  transition: background-color 0.3s ease;
  font-size: 16px;
}

/* Efek hover untuk interaktivitas */
nav.navbar a:hover {
  background-color: #f0ffff;
}

nav.navbar a:hover {
  background-color: #f0ffff;
}

    nav.navbar a.navbar-brand,
    nav.navbar button.navbar-toggler {
      color: #fff;
    }

    nav.navbar a.nav-link,
    nav.navbar button.btn-dark {
      color: #fff;
      transition: color 0.3s;
    }

    nav.navbar a.nav-link:hover,
    nav.navbar button.btn-dark:hover {
      color: #ffc107;
    }

    main.container {
      margin-top: 8rem;
    }

    .jumbotron {
      background-image: url('foto1.jpg');
      background-size: cover; 
      background-position: center center; 
      color: #fff; 
      padding: 6rem;
      border-radius: 60px;
      font-family: 'Arial', sans-serif; 
      font-size: 1.2rem; /* Ukuran font yang lebih besar untuk keterbacaan */
      font-weight: bold; /* Membuat teks lebih tebal untuk visibilitas lebih baik */
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Bayangan teks untuk meningkatkan kontras */
    }

    .jumbotron h1,
    .jumbotron h2 {
      margin-bottom: 4rem;
    }
  </style>
</head>

<body>

  <nav class="navbar fixed-top navbar-expand-lg py-3 navbar-dark">
    <div class="container d-flex align-items-center">
      <a class="navbar-brand" href="#">Klinik Sehaterus</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
        aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <?php
        if (isset($_SESSION['username'])) {
          // Jika pengguna sudah login, tampilkan tombol "Logout"
        ?>
        <ul class="navbar-nav d-flex align-items-lg-center ms-auto">
          
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="index.php">Home</a>
    </li>
    <li class="nav-item dropdown">
      <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        Dokter
      </button>
      <ul class="dropdown-menu dropdown-menu-dark">
        <li><a class="dropdown-item" href="index.php?page=dokter">Cari Data Dokter</a></li>
        <li><a class="dropdown-item" href="index.php?page=jadwalDokter">Jadwal Dokter</a></li>
      </ul>
    </li>
  </ul>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=poli">Poli</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=obat">Obat</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=pasien">Pasien</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="Logout.php">Logout (<?php echo $_SESSION['fullname'] ?>)</a>
          </li>
        </ul>
        <?php
        } else {
          // Jika pengguna belum login, tampilkan tombol "Login" dan "Register"
        ?>
        <ul class="navbar-nav d-flex align-items-lg-center ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=cekRM">Rawat Jalan</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=loginUser">Login Admin & Dokter</a>
          </li>
        </ul>
        <?php
        }
        ?>
      </div>
    </div>
  </nav>

  <main role="main" class="container">
    <?php
    if (isset($_GET['page'])) {
      include($_GET['page'] . ".php");
    } else {
      echo '<div class="jumbotron">
              <h1 class="display-4">Selamat Datang Di Klinik Sehaterus,</h1>
              <h2 class="lead">Kesehatanmu Prioritas Segalanya ';
      if (isset($_SESSION['username'])) {
        //jika sudah login tampilkan username
        echo '. ' . $_SESSION['fullname'] . '</h2><hr></div>';
      } else {
        echo '</h2><hr><p class="lead">Silakan Login terlebih dahulu .</p></div>';
      }
    }
    ?>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/71c2ab2c83.js" crossorigin="anonymous"></script>
</body>

</html>
