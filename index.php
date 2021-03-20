<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Trang chủ</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="CSS/user.css">
	<link rel="stylesheet" href="CSS/admin.css">
	<link rel="stylesheet" href="CSS/hieu_ung.min.css">
</head>
<body>
	<div class="div_tong" id="id_tong" >
		<?php 
		include('include/head.php');
		include('include/menu.php');
		include('include/banner.php');
		include('include/content.php');
		include('include/footer.php') ?>
		
	</div>
	<script src="include/JS/hieu_ung.min.js"></script>
	<script src="include/JS/hieu_ung.js"></script>
	<script type="text/javascript" src="include/JS/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="include/JS/menu.js"></script>
</body>
</html>