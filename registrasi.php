<?php
    session_start();
    include 'koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>

    <link rel="stylesheet" href="logres.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        if(isset($_POST['username'])){
            $nama = $_POST['nama'];
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $level = $_POST['level'];

            $sql = "INSERT INTO user (nama, username, password, level) VALUES ('$nama', '$username', '$password', '$level')";
            $query = mysqli_query($conn, $sql);

            if($query){
                echo "<script>alert('Berhasil mendaftar. Silahkan login')</script>";
            }else{
                echo "<script>alert('Gagal mendaftar')</script>";
            }
        }
    ?>

    <div class="div-logo">
            <img class="logo" src="gambar/logo.svg" alt="">
            <p>Sekul Legend</p>
    </div>

    <div class="div1">
        <div class="form">
            <br>
            <h1>Sign Up</h1>
            <ul>
                <li>Jika kamu sudah mempunyai akun</li>
                <li>Kamu dapat <a class="link-daftar" href="login.php">login !</a></li>
            </ul>
            <br>
            <form class="form-login" name="form-login" action="" method="post">
            <div class="form-nama">
                    <label for="tulisan kecil nama">nama</label><br>
                    <input class="nama" name="nama" type="text" placeholder="Masukkan nama...">
                </div><br>
                <div class="form-username">
                    <label for="tulisan kecil username">username</label><br>
                    <input class="username" name="username" type="text" placeholder="Masukkan username...">
                </div><br>
                <div class="form-password">
                    <label for="tulisan kecil password">password</label><br>
                    <input class="password" name="password" type="password" placeholder="Masukkan password...">
                </div>
                <button class="btn-signup" type="submit">Sign Up</button>       
            </form>
        </div>

        <div class="gambar-signup">
            <img src="gambar/login.svg" alt="lock-signup">
        </div>
    </div>
    
</body>
</html>