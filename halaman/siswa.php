<?php
    include '../koneksi.php';

    //INISIALISASI SESSION
    session_start();

    //MENGECEK APAKAH ADA USER YANG AKTIF, JIKA TIDAK ARAHKAN KE LOGIN.php
    if(!isset($_SESSION['user'])){
        header('Location: ../login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siswa</title>
    <link rel="stylesheet" href="siswa.css" type="text/css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <div class="toggle">
            <input type="checkbox" />
            <span></span>
            <span></span>
            <span></span>
        </div>
        <ul>
            <div class="sidebar">
                <div class="toggle">
                    <input type="checkbox" />
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

                <p class="namalogo">Sekul Legend</p>

            </div><br>
            <div>
                <li><a class="dash1" href="../index.php"><img src="../gambar/home.svg" alt="Home">Dashboard</a></li><br>
                <li><a  class="dash2" href=""><img src="../gambar/kelas.svg" alt="Kelas">Kelas</a></li><br>
                <li><a  class="dash3" href=""><img src="../gambar/kalender.svg" alt="Kalender">Kalender</a></li>
            </div>
        </ul>

        <p class="namalogo">Sekul Legend</p>

        <div class="menu-header">
            <li type="none"><a class="profil" href="bio_admin.php">Profil</a></li>
            <li type="none"><a class="logout" href="../logout.php">Logout</a></li>
        </div>
    </nav>

    <div class="row1">
        <div>
            <img src="../gambar/logo.svg" width="200px" style="margin: 50px;">
        </div>
        <div class="row1_2">
            <h2>Administrator</h2>
            <p class="isirow2">Selamat Datang, <?php echo $_SESSION['user']; ?></p>
        </div>
    </div>

    <div class="row2">
        <p class="kode-judul">Semua kelas Anda telah diarsipkan</p>
        <form class="kode-form" action="" method="POST" id="kodeForm">
            <a class="gabung-kelas" href="kelas.html">Gabung Kelas</a>
            <br />

            <p id="kodeKelas"></p>
        </form>
    </div>
    
    <script>
        const toggle = document.querySelector('.toggle input');
        const nav = document.querySelector('nav ul');

        toggle.addEventListener('click', function() {
            nav.classList.toggle('slide');
        });
    </script>
</body>
</html>