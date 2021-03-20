<?php session_start(); ?>
<!DOCTYPE html>
<!-- Hello ^_^ -->
<html>
<head>
	<title>Giới thiệu</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="CSS/user.css">
	<link rel="stylesheet" href="CSS/admin.css">
	<style type="text/css" media="screen">
		.div {
			width: 90%;
			height: auto;
			margin: auto;
			float: none;
			margin-top: 3px;
			padding-bottom: 50px;
		}
		.tieu_de {
			padding: 20px 0 20px 10px;
			font-size: 25px;
		}
		.noi_dung {
			width: 95%;
			height: auto;
			padding: 30px;
			line-height: 1.8;
		}
		.div_anh {
			width: 80%;
			height: auto;
			margin: auto;
			margin-top: 20px;
			margin-bottom: 10px;
			border-radius: 5px;
		}
		.div_anh img {
			width: 100%;
			border-radius: 5px;
		}
	</style>
</head>
<body>
	<?php 
	include('include/head.php');
	include('include/menu.php');
	include('Admin/common/connect.php');
	if(isset($_GET['ma_loai_thu_cung'])) {
		$ma_loai_thu_cung = $_GET['ma_loai_thu_cung'];
		echo "<script> window.location.replace('../doAn1/?ma_loai_thu_cung=$ma_loai_thu_cung');</script>";
	}
	$sql = "select * from gioi_thieu";
	$result = mysqli_query($connect, $sql);
	$each = mysqli_fetch_array($result);
	$thu_muc_anh = 'image/'
	?>
	<div class="div_tong">
		<div class="div">
			<p class="tieu_de"><?php echo $each['tieu_de'] ?></p>
			<p class="noi_dung"><?php echo nl2br($each['noi_dung'])?></p>
			<div class="div_anh"><img src="<?php echo $thu_muc_anh . $each['anh'] ?>"></div>
			<p class="noi_dung"><?php echo nl2br($each['noi_dung_anh'])?></p>
		</div>
		<?php include('include/footer.php') ?>
	</div>
	<script type="text/javascript" src="include/JS/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="include/JS/menu.js"></script>
</body>
</html>