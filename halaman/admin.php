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
    </center>
    
</body>
</html>