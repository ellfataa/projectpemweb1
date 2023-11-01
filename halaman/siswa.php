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
    <title>Guru</title>
    <link rel="stylesheet" href="siswa.css" type="text/css">

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
        <div>
            <img src="../gambar/logo.svg" width="200px" style="margin: 50px;">
        </div>
        <div class="row1_2">
            <h2>Guru</h2>
            <p class="isirow2">Selamat Datang, <?php echo $_SESSION['user']; ?></p>
        </div>
    </div>

    <div class="row2">
        <p class="kode-judul">Semua kelas Anda telah diarsipkan</p>
        <form class="kode-form" action="../kelas.php" method="POST" id="kodeForm">
            <label for="kelas">Kelas : </label>
            <input class="kelas" type="text" name="kelas" id="kelas" />
            <br />
            
            <input class="submit" type="submit" value="Buat Kelas" id="buatKelas" />
            <br />

            <p id="kodeKelas"></p>
        </form>
    </div>
    
    <script>
        const toggle = document.querySelector('.toggle input');
        const nav = document.querySelector('nav ul');

        toggle.addEventListener('click', function() {
            nav.classList.toggle('slide');
        });

        var kodeForm = document.getElementById("kodeForm");
        var kelas = document.getElementById("kelas");
        var kodeKelas = document.getElementById("kodeKelas");
        var generateButton = document.getElementById("buatKelas");

        var daftarKarakter = [
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
            'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm',
            'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
            1, 2, 3, 4, 5, 6, 7, 8, 9
        ];

        // Variabel untuk melacak apakah formulir sudah dikirim
        var isFormSubmitted = false;


        // Menghasilkan bilangan bulat acak antara min (termasuk) sama max (nggak termasuk)
        function getRandomInt(min, max) {
            min = Math.ceil(min);
            max = Math.floor(max);
            return Math.floor(Math.random() * (max - min)) + min;
        }

        // Menghasilkan value acak dengan panjang tertentu
        function generateRandomValue(panjang) {
            var hasil = "";
            for (var i = 0; i < panjang; i++) {
            var randomIndex = getRandomInt(0, daftarKarakter.length);
            hasil += daftarKarakter[randomIndex];
            }
            return hasil;
        }

        // Fungsi yang akan dijalankan saat tombol submit ditekan
        function generateRandomCode(event) {
            event.preventDefault(); // Mencegah pengiriman form

            // Menghasilkan value acak dengan panjang 4
            var valueAcak = generateRandomValue(4);
            var kode = document.createElement("p");
            kode.textContent = "Kode kelas : " + valueAcak;

            // Menambahkan elemen <p> ke dalam body dokumen
            kodeKelas.appendChild(kode);
            
            // Menonaktifkan tombol "Generate" dan menandai bahwa formulir sudah dikirim
            generateButton.disabled = true;
            isFormSubmitted = true;
        }

        // Menambahkan event listener ke form
        var kodeForm = document.getElementById("kodeForm");
        kodeForm.addEventListener("submit", generateRandomCode);
    </script>
</body>
</html>