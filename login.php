<?php
    session_start();
    if(isset($_SESSION['admin_username'])){
        header("location:home.php");
    }
    include "koneksi.php";
    $username = "";
    $password = "";
    $email = "";
    $err = "";
    if(isset($_POST['login'])){
        //MENGINPUT DATA LOGIN
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        if($username == "" || $password == "" || $email == ""){
            $err .= "<li>Silahkan masukkan username, password, dan email</li>";
        }

        //MENGECEK USERNAME
        if(empty($err)){
            $sql = "SELECT * FROM admin WHERE username = '$username'";
            $query = mysqli_query($conn,$sql);
            $cek = mysqli_fetch_array($query);
            if($cek['password'] != $password){
                $err .= "<li>Akun tidak ditemukan</li>";
            }
        }

        //MEMBUAT HAK AKSES
        if(empty($err)){
            $id_admin = $cek['id_admin'];
            $sql = "SELECT * FROM admin_akses WHERE id_admin = '$id_admin' ";
            $query = mysqli_query($conn,$sql);
            while($cek = mysqli_fetch_array($query)){
                $hak_akses[] = $cek['id_akses']; //guru dan siswa
            }
            if(empty($hak_akses)){
                $err .= "<li>Akun tidak memiliki hak akses ke halaman admin</li>";
            }
        }

        //MASUK KE SESSION AGAR KETIKA SUBMIT LANGSUNG MASUK KE HALAMAN USER(ADMIN, GURU, SISWA)
        if(empty($err)){
            $_SESSION['admin_username'] = $username;
            $_SESSION['admin_akses'] = $hak_akses;
            header("location:home.php");
            exit();
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="style.css">    
</head>
<body>
    <div id="app">
        <h1>Halaman Login</h1>
        <?php
            if($err){
                echo "<ul>$err</ul>";
            }
        ?>
        <form action="" method="post">
            <input name="username" type="text" class="input" placeholder="Masukkan username" value="<?php echo $username ?>"><br><br>
            <input name="password" type="password" class="input" placeholder="Masukkan password"><br><br>
            <input name="email" type="email" class="input" placeholder="Masukkan email"><br><br>
            <input name="login" type="submit" value="Submit">
        </form>
    </div>
    
</body>
</html>