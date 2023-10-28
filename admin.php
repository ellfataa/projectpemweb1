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
    <link rel="stylesheet" href="admin.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Admin</title>
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
            <li><a href="">Dashboard</a></li>
            <li><a href="">Kelas</a></li>
            <li><a href="">Kalender</a></li>
            <li><a href="">Setelan</a></li>
        </ul>
        <div class="logo">
            <h4>Sekul Legend</h4>
        </div>
        <div class="logo_profil">
            <a href="profil.php"><img src="profil.jpg" alt="profil"/></a>
        </div>
    </nav>
    <div class="row1">
        <div>
            <img src="../gambar/logo.svg" width="200px" style="margin: 50px;">
        </div>
        <div class="row1_2">
            <h2>Administrator</h2>
            <p>Selamat Datang, <?php echo $_SESSION['user']; ?></p>
        </div>
    </div>


    <!-- <center>
        <div id="app">
            <nav>
                <ul>
                    <li type="none">
                        <a href="bio_admin.php">Biodata Admin</a>&nbsp;
                        <a href="bio_guru.php">Biodata Guru</a>&nbsp;
                        <a href="bio_siswa.php">Biodata Siswa</a>
                    </li>
                </ul>
            </nav>
        </div> 
        <h1>Halaman Administrator</h1>
        <a href="../index.php">Home</a>
        <a href="../logout.php">Logout</a>
        <br>
        <h1>Selamat datang, <?php echo $_SESSION['user']; ?></h1>
        Halaman setelah login
    </center> -->
    <script>
        const toggle = document.querySelector('.toggle input');
        const nav = document.querySelector('nav ul');

        toggle.addEventListener('click', function() {
            nav.classList.toggle('slide');
        });
    </script>
</body>
</html>