<?php

if (!isset($_SESSION)) {
  session_start();
}

include_once("koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Klinik Sehaterus.Dokter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  <style>
        body {
            background-color: lightgrey;
        }
    </style>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #20b2aa;">
  <div class="container">
   
    <a class="navbar-brand" href="berandaDokter.php">Klinik Sehaterus</a>
    
    
    <button class="navbar-toggler" 
            type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#navbarNav" 
            aria-controls="navbarNav" 
            aria-expanded="false" 
            aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <?php
                if (isset($_SESSION['nip'])) {
                    // Jika pengguna sudah login, tampilkan tombol "Logout"
                ?>
                    <ul class="navbar-nav d-flex align-items-lg-center ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="berandaDokter.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="berandaDokter.php?page=periksa">Periksa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="berandaDokter.php?page=riwayat">Riwayat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="berandaDokter.php?page=aturJadwalDokter">Set Jadwal</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout (<?php echo $_SESSION['nip'] ?>)</a>
                        </li>
                    </ul>
                <?php
                } else {
                    // Jika pengguna belum login, tampilkan tombol "Login" dan "Register"
                ?>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=loginDokter">Login</a>
                        </li>
                    </ul>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>
    

    <main role="main" class="container" style="margin-top: 5rem; padding: 2rem; background-color: #f8f9fa; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); text-align: center;">
    <?php
    if (isset($_GET['page'])) {
        include($_GET['page'] . ".php");
    } else {
        echo "<div style='text-align: center; margin-bottom: 1.5rem;'>";
        echo "<h2 style='color: #004d4d;'>Selamat Datang Dokter </h2>";

        if (isset($_SESSION['nama'])) {
            // Jika sudah login, tampilkan nama
            echo "<p style='font-size: 1.1rem; color: #555;'>Halo, " . $_SESSION['nama'] . "</p>";
        } else {
            echo "<p style='font-size: 1.1rem; color: #555;'>Silakan Login untuk menggunakan sistem.</p>";
        }

        echo "</div><hr style='border-top: 2px solid #004d4d; margin-bottom: 2rem;'>";

        // Menampilkan gambar di tengah container
        echo "<div style='text-align: center; margin: 2rem 0;'>";
        echo "<img src='dokter1.png' alt='Gambar' style='max-width: 200px; height: auto; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);'>";
        echo "</div>";
    }
    ?>
</main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/71c2ab2c83.js" crossorigin="anonymous"></script>
  </body>
</html>