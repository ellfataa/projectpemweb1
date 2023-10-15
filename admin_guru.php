<?php
    include "inc_header.php";
    if(!in_array("guru",$_SESSION['admin_akses'])) {
        echo "Anda tidak punya akses";
        include "inc_footer.php";
        exit();
    }
?>
<h1>Halaman Guru</h1>
Selamat Datang di halaman guru
<?php
    include "inc_footer.php";
?>