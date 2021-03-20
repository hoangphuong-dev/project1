<?php 
session_start();
unset($_SESSION['gio_hang']);

header("location:../xem_gio_hang.php");