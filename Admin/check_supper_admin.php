<?php 
	session_start();
	if($_SESSION['cap_do'] != 1) { // chỉ đăng nhập admin mới có biến này 
		header("location:../index.php?error=Bạn không có quyền vào đây !");
	}
 ?>
