<?php
    session_start();
    include 'koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>

    <link rel="stylesheet" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        if(isset($_POST['username'])){
            $username = $_POST['username'];
            $password = md5($_POST['password']);

            $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
            $query = mysqli_query($conn, $sql);

            $row = mysqli_num_rows($query);

            
            if($row > 0){
                $row = mysqli_fetch_assoc($query);
                if($row['level'] == 'Admin'){
                    $_SESSION['user'] = $row['username'];
                    $_SESSION['user'] = $row['nama'];
                    $_SESSION['user'] = $row['level'];
                    echo '<script> alert ("Selamat datang, '.$row['nama'].'");
                    location.href= "halaman/admin.php"</script>';
                } else if($row['level'] == 'Guru'){
                    $_SESSION['user'] = $row['username'];
                    $_SESSION['user'] = $row['nama'];
                    $_SESSION['user'] = $row['level'];
                    echo '<script> alert ("Selamat datang, '.$row['nama'].'");
                    location.href= "halaman/guru.php"</script>';
                } else if($row['level'] == 'Siswa'){
                    $_SESSION['user'] = $row['username'];
                    $_SESSION['user'] = $row['nama'];
                    $_SESSION['user'] = $row['level'];
                    echo '<script> alert ("Selamat datang, '.$row['nama'].'");
                    location.href= "halaman/siswa.php"</script>';
                }else{
                    echo '<script>alert ("Username atau password salah")</script>';
                }
            }else{
                echo '<script>alert ("Username atau password salah")</script>';
            }
        }
    ?>
    <center>
    <ul>
        <li class="sekul-legend">
            <img class="logo" src="gambar/logo.svg" alt=""><br>
            Sekul Legend
        </li>
    </ul> 
    </center>
    <div class="div1">
        
        <div class="form">
            <br>
            <h1>Sign In</h1>
            <ul>
                <li>Jika kamu belum mempunyai akun</li>
                <li>Kamu dapat <a class="link-daftar" href="registrasi.php">daftar !</a></li>
            </ul>
            <br>
            <form class="form-login" name="form-login" action="" method="post">
                <div class="form-username">
                    <label for="tulisan kecil username">username</label><br>
                    <input class="username" name="username" type="text" placeholder="Masukkan username...">
                </div><br>
                <div class="form-password">
                    <label for="tulisan kecil password">password</label><br>
                    <input class="password" name="password" type="password" placeholder="Masukkan password...">
                </div>
                <button class="btn-login" type="submit">Login</button>       
            </form>
        </div>

        <div class="gambar-login">
            <img src="gambar/login.svg" alt="">
        </div>
    </div>
</body>
</html>