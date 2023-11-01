<?php
    include '../koneksi.php';
    error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);

    //INISIALISASI SESSION
    session_start();

    //MENGECEK APAKAH ADA USER YANG AKTIF, JIKA TIDAK ARAHKAN KE LOGIN.php
    if(!isset($_SESSION['user'])){
        header('Location: ../login.php');
    }
    
    $nama_kelas =  isset($_GET['nama_kelas']) ? $_GET['nama_kelas'] : '';
    $kd_kelas = isset($_GET['kd_kelas']) ? $_GET['kd_kelas'] : '';
    $result = mysqli_query($conn, "SELECT * FROM kelas WHERE kd_kelas='$kd_kelas'");

    if(isset($_POST['buatKelas'])){
        $nama_kelas = $_POST['nama_kelas'];
        $kd_kelas = $_POST['kd_kelas'];

        $query = mysqli_query($conn, "SELECT * from kelas where nama_kelas = .'$nama_kelas'.");
        while($user_data = mysqli_fetch_array($query))
        {
            $nama_kelas = $user_data['nama_kelas'];
            $kd_kelas = $user_data['kd_kelas'];
        }
    }

    /*$kd_materi = isset($_GET['kd_materi']) ? $_GET['kd_materi'] : '';
    if($kd_materi!=""){
        $sql = "SELECT * from materi where kd_materi = '$kd_materi' ";
        $row = mysqli_fetch_array(mysqli_query($conn,$sql));
        $file_materi = $row['file_materi'];
        unlink($file_materi);

        $hapus = "delete from materi where kd_materi='$file_materi' ";
        $query = mysqli_query($conn, $hapus);

        if($query){
            ?>
            <!-- HTML -->
            <script>
                alert('Data Berhasil Dihapus!');
                document.location='kelas.php'
            </script>
            <?php
        }
    }*/
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guru</title>
    <link rel="stylesheet" href="kelas.css" type="text/css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <div class="toggle">
            <input type="checkbox" />
            <span></span>
            <span></span>
            <span></span>
        </div>
        <ul>
            <div class="sidebar">
                <div class="toggle">
                    <input type="checkbox" />
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

                <p class="namalogo">Sekul Legend</p>

            </div><br>
            <div>
                <li><a class="dash1" href="../index.php"><img src="../gambar/home.svg" alt="Home">Dashboard</a></li><br>
                <li><a  class="dash2" href=""><img src="../gambar/kelas.svg" alt="Kelas">Kelas</a></li><br>
                <li><a  class="dash3" href=""><img src="../gambar/kalender.svg" alt="Kalender">Kalender</a></li>
            </div>
        </ul>

        <p class="namalogo">Sekul Legend</p>

        <div class="menu-header">
            <li type="none"><a class="profil" href="bio_admin.php">Profil</a></li>
            <li type="none"><a class="logout" href="../logout.php">Logout</a></li>
        </div>
    </nav>

    <div class="row1">
        <div class="row1_2">
            <h2>Ruang Kelas</h2>
            <p class="isirow2">Selamat Datang, <?php echo $_SESSION['user']; ?></p>
        </div>
    </div>
    
    <div class="row2">
            <div class="kuis">
                <h2>Membuat Kuis</h2>
                <a href="kuis.php">Membuat kuis</a>
            </div>
            <div class="materi">
                <h2>Upload Materi</h2>
                <a href="Materi/materi2.php">Membuat Materi</a>
            </div>
    </div>

    <!-- <center>
        <h1>Data Pegawai</h1>

        <p>
            <a href="Materi/materi2.php">Tambah Data</a>
        </p>

        <table border="1" align="center" cellspacing='0' cellpadding='10'>
            <tr>
                <th>No</th>
                <th>Kode Materi</th>
                <th>judul materi</th>
                <th>Tanggal materi</th>
                <th>File Materi</th>
            </tr>

            /*
                $no = 1;
                $sql = "SELECT * from materi order by kd_materi desc";
                $query = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_array($query)){
                    echo "
                        <tr>
                            <td>$no</td>
                            <td>$row[kd_materi]</td>
                            <td>$row[judul_materi]</td>
                            <td>$row[tgl_materi]</td>
                            <td><img src='$row[file_materi]' width='200' height='300'></td>
                            <td>
                                <a href='materi2.php?nip=$row[kd_materi]'> Edit </a> | 
                                <a href='kelas.php?nip=$row[kd_materi]'> Hapus </a>
                            </td>
                        </tr>
                    ";
                    $no++;
                }

           */ ?>
        </table>
    </center> -->
</body>
</html>


</body>
</html>