<?php
    include "inc_header.php";
    if(!in_array("siswa",$_SESSION['admin_akses'])) {
        echo "Anda tidak punya akses";
        include "inc_footer.php";
        exit();
    }
?>
<h1>Halaman Siswa</h1>
Selamat Datang di halaman siswa
<?php
    include "inc_footer.php";
?>