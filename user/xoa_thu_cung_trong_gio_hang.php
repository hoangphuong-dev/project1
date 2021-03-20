<?php 

$ma_san_pham = $_GET['ma'];

session_start();

unset($_SESSION['gio_hang'][$ma_san_pham]);
header("location:../xem_gio_hang.php");
