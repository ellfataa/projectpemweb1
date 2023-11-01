<?php
if (isset($_POST['Submit'])) {
    $nama_kelas = $_POST['nama_kelas'];
    $kd_kelas = $_POST['kd_kelas'];
    include ("koneksi.php");

    $result = mysqli_query($conn, "INSERT INTO kelas(nama_kelas, kd_kelas) VALUES('$nama_kelas','$kd_kelas')");
    $read = mysqli_query($conn, "SELECT * FROM pengguna order by id desc");
    $data = mysqli_fetch_array($read);
    header("Location: kelas.php?kd_kelas=$data.['kd_kelas'].");
}
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Membuat Kelas Baru</title>
</head>
<body>
    <center>
    <h1>Membuat Kelas Baru</h1>
    <form action="create_kelas.php" method="POST" id="createKelas">
        <table>
            <tr>
                <td>Nama Kelas</td>
                <td><input type="text" name="nama_kelas" id="kelas" /></td>
            </tr>
            <tr>
                <td>Kode Kelas</td>
                <td><input type="submit" name="kd_kelas" id="buatKelas" /></td>
            </tr>
            <tr>
                <p id="kodeKelas"></p>
            </tr>
        </table>
    </form>
    <form action="kelas.php">
        <input type="text">
        <input type="submit" name="KODE_KELAS" value="Buat Kelas">
    </form>
</center>
<script>
        var kcreateKelas = document.getElementById("createKelas");
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
        var createKelas = document.getElementById("createKelas");
        createKelas.addEventListener("submit", generateRandomCode);

        const tokenInput = document.querySelector("#token")
        const token = document.querySelector("#tokenspan")
        const authForm = document.querySelector("#authform")
        const msg = document.querySelector(".msg")

        //membuat token random
        let randToken = Math.random().toString(36).substr(2);
        let attemptLeft = 3;
        token.innerHTML = randToken;

        //membuat event listener
        authForm.addEventListener('submit',onSubmit);
        function onSubmit(e){
            e.preventDefault();
            console.log('click');
            //melakukan pengecekan token
            if(tokenInput.value === randToken){
                msg.innerHTML = "Token Benar, Anda akan diarahkan ke halaman tryout"
                setTimeout(() => window.location.href = "../tryout1/tryoututbk.html",2000)
                    
            } else {
                attemptLeft--;
                msg.innerHTML = "Token Salah, Anda memiliki " + attemptLeft + " kesempatan lagi"
                if(attemptLeft === 0){
                    msg.innerHTML = 'Anda telah mencoba 3 kali, silahkan coba lagi nanti'
                    setTimeout(() => window.location.href = "../index.html",2000)
                }
            }
        }
        console.log(randToken);

    </script>

</body>
</html>