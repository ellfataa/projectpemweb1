<?php
    include '../koneksi.php';
    error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);

    //INISIALISASI SESSION
    session_start();

    //MENGECEK APAKAH ADA USER YANG AKTIF, JIKA TIDAK ARAHKAN KE LOGIN.php
    if(!isset($_SESSION['user'])){
        header('Location: ../login.php');
    }

    if (isset($_POST['submit'])) {
        $kd_materi = $_POST['kd_materi'];
        $judul_materi = $_POST['judul_materi'];
        $file_materi = $_FILES['file_materi']['name'];
        $tipe_file_materi = $_FILES['file_materi']['type'];
        if($file_materi!=''){
            $Uploadmateri = 'Materi/'. $file_materi;
            move_uploaded_file($_FILES['file_materi']['tmp_name'],
            $Uploadmateri);
        }
        $result = mysqli_query($conn, "INSERT INTO materi(kd_materi, judul_materi, file_materi) VALUES('$kd_materi','$judul_materi', '$file_materi')");

        header("Location: ../kelas.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>INI COBA</h1>
    <form name="formMateri" action="../kelas.php" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Kode materi</td>
                <td><input type="text" name="kd_materi" /></td>
            </tr>
            <tr>
                <td>Judul materi</td>
                <td><input type="text" name="judul_materi" /></td>
            </tr>
            <tr>
                <td>Kirim file:</td>
                <td><input type="file" name="file_materi" /></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" /></td>
            </tr>
        </table>
    </form>
</body>
</html>