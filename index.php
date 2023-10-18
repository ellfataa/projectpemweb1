<?php
    include 'koneksi.php';

    //INISIALISASI SESSION
    session_start();

    //MENGECEK APAKAH ADA USER YANG AKTIF, JIKA TIDAK ARAHKAN KE LOGIN.php
    if(!isset($_SESSION['user'])){
        header('Location: login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <center>
        <h1>Ini halaman utama</h1>
        <a href="index.php">Home</a>
        <a href="logout.php">Logout</a>
        <br>
        Halaman setelah login
    </center>
    
</body>
</html>