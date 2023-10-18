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
    <title>Admin</title>
</head>
<body>
    <center>
        <div id="app">
            <nav>
                <ul type="none">
                    <li>
                        <a href="bio_siswa.php">Biodata Siswa</a>
                    </li>
                </ul>
            </nav>
        </div> 
        <h1>Halaman Siswa</h1>
        <a href="../index.php">Home</a>
        <a href="../logout.php">Logout</a>
        <br>
        <h1>Selamat datang, <?php echo $_SESSION['user'] ?></h1>
        Halaman setelah login
    </center>
    
</body>
</html>