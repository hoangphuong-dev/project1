<?php 
session_start();
	// session_destroy();
unset($_SESSION['gio_hang']);
unset($_SESSION['ma']);
unset($_SESSION['ten']);

header("location:../index.php");