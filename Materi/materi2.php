<?php
    include "../koneksi.php";
    error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);

    //INISIALISASI SESSION
    session_start();

    //MENGECEK APAKAH ADA USER YANG AKTIF, JIKA TIDAK ARAHKAN KE LOGIN.php
    if(!isset($_SESSION['user'])){
        header('Location: ../login.php');
    }

    if(isset($_POST['input'])){
        $kd_materi = $_POST['kd_materi'];
        $judul_materi = $_POST['judul_materi'];
        $tgl_materi = $_POST['tgl_materi'];
        $file_materi = $_FILES['file_materi']['name'];
        if($file_materi!=''){
            $upload = 'Materi/'.$file_materi;
            move_uploaded_file($_FILES["file_materi"]["tmp_name"], $upload);
        }
        $insert = "INSERT INTO materi(kd_materi,judul_materi,tgl_materi,file_materi) values('$kd_materi','$judul_materi','$tgl_materi','$file_materi') ";
        $query = mysqli_query($conn, $insert);
        if($query){
            ?>
            <!-- HTML -->
            <script>
                alert('Data Berhasil Ditambahkan!');
                document.location='../kelas.php';
            </script>
            <?php
        }
    }
?>

<form name='form' method='post' action='../kelas.php' enctype="multipart/form-data">
    <table align='center'>
        <tr>
            <td>kode Materi</td>
            <td>:</td>
            <td>
                <input type='text' name='kd_materi'>
            </td>
        </tr>
        <tr>
            <td>Judul Materi</td>
            <td>:</td>
            <td>
                <input type='text' name='judul_materi'>
            </td>
        </tr>
        <tr>
            <td>Tanggal Materi</td>
            <td>:</td>
            <td>
                <input type='date' name='tgl_materi'>
            </td>
        </tr>
        <tr>
            <td>File Materi</td>
            <td>:</td>
            <td>
                <input type="file" name="file_materi">
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>
                <input type='submit' name='input' value='Tambah materi'>
            </td>
        </tr>
    </table>
</form>