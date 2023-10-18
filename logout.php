<?php
    include 'koneksi.php';
    
    session_start();
    session_destroy();
?>

<script type="text/javascript">
    alert ('Anda berhasil logout');
    location.href = "login.php";
</script>