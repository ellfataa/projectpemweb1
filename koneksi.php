<?php
    error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'sekul_legend';

    $conn = mysqli_connect($host, $user, $pass, $db) or die('Not connect');
    date_default_timezone_set('Asia/Jakarta');
?>