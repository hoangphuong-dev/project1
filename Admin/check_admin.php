<?php 
	session_start();
	if(empty($_SESSION['admin'])) { // chỉ đăng nhập admin mới có biến này 
		header("location:../index.php?error=Bạn phải đăng nhập đã");
	}
 ?>
