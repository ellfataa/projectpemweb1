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

    <form action="" method="post">
        <table align="center">
            <tr>
                <td colspan="2" align="center">
                    <h3>Pendaftaran User</h3>
                </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input name="nama" type="text"></td>
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
                <td>Pilih role Anda</td>
                <td>
                    <select name="level">
                        <option value="Guru">Guru</option>
                        <option value="Siswa">Siswa</option>
                    </select>
                </td>
            </tr>
            <tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit">Sign Up</button>
                        <a href="login.php">Login</a>
                    </td>
                </tr>
            </tr>
        </table>
    </form>
    
</body>
</html>