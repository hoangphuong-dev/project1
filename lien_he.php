<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Liên hệ</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="CSS/user.css">
	<link rel="stylesheet" href="CSS/admin.css">
	<style type="text/css" media="screen">
		.div_content {
			width: 90%;
			height: auto;
			margin: auto;
			float: none;
			background: white;
			margin-top: 3px;
			padding-bottom: 50px;
		}
		.div_content h2 {
			padding: 20px 0 0 10px;
		}
		.ban_do{
			height: auto; 
			float:left;
			margin-bottom: 20px;
			margin-top: 20px;
		}
		.ban_do i{
			font-size:33px; margin-right: 10px; margin-bottom: 15px;
		}
		.ban_do i span{
			font-size: 20px;
		}
		.ban_do p {
			font-size: 20px;
			margin-bottom: 20px;
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
	$sql_footer = "select * from footer";
	$result = mysqli_query($connect, $sql_footer);
	$each_footer = mysqli_fetch_array($result);
	?>
	<div class="div_tong">
		<div class="div_content">
			<div class="ban_do" style="width: 60%">
				<i class="fa fa-map-marker"></i><span>Vị trí cửa hàng </span>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.7194101709792!2d105.84541831461348!3d21.003881786011807!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac743bb83537%3A0xf3f7a91f010a8ef0!2zTmjDoCBBMTcsIDE3IFThuqEgUXVhbmcgQuG7rXUsIELDoWNoIEtob2EsIEhhaSBCw6AgVHLGsG5nLCBIw6AgTuG7mWksIFZpZXRuYW0!5e0!3m2!1sfr!2s!4v1611300789828!5m2!1sfr!2s" width="800px" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
			</div>
			<div class="ban_do" style="width: 40%; padding-left: 20px;">
				<p>Thông tin liên hệ : </p>
				<i class="fa fa-map-marker"></i><span>Vị trí : <?php echo $each_footer['dia_chi'] ?> </span> <br>
				<i class="fa fa-phone fa-2x"></i><span>Số điện thoại : <?php echo $each_footer['sdt'] ?> </span> <br>
				<i class="fa fa-envelope fa-2x"></i><span>Email : <?php echo $each_footer['email'] ?></span>
			</div>
		</div>
		<?php include('include/footer.php') ?>
	</div>
	<script type="text/javascript" src="include/JS/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="include/JS/menu.js"></script>
</body>
</html>

