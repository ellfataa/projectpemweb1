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

    <form action="" method="post">
        <table align="center">
            <tr>
                <td colspan="2" align="center">
                    <h3>Login User</h3>
                </td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input name="username" type="text"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input name="password" type="password"></td>
            </tr>
            <tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit">Login</button>
                        <a href="registrasi.php">Daftar</a>
                    </td>
                </tr>
            </tr>
        </table>
    </form>
    
</body>
</html>