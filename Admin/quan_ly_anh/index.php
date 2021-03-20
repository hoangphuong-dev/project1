<?php include('../check_supper_admin.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản lý Ảnh</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../CSS/admin.css">
	<link rel="stylesheet" href="../../CSS/user.css">
	<link rel="stylesheet" href="../quan_ly_trang_gioi_thieu/chinh_anh.css">
	<style type="text/css" media="screen">
		.kh table {
			margin: auto; width: 90%; margin-top: 50px; 
			background: #fed18c; opacity: 1; font-size: 20px;
			border-radius: 5px; border: 1;
		}
	</style>
</head>
<body>
	<?php 
	include('../common/connect.php');
	$thu_muc_anh = '../../image/';
	$sql = "select * from anh";
	$result = mysqli_query($connect, $sql);
	?>
	<?php include('../common/header_admin.php') ?>
	<?php include('../common/menu_admin.php') ?>
	<div class="div_tong" >
		<div class="div_content">
			<div class="all_table kh" style="width: 100%;">
				<button class="quay_lai" onclick="window.history.back();"><i class="fa fa-reply"></i>Quay lại</button>
				<table>
					<tr id="ROW1">
						<td>Tên ảnh</td>
						<td>Ảnh</td>
						<td>Chỉnh sửa</td>
					</tr>
					<?php foreach ($result as $each) {  ?>
						<tr>
							<td width="30%"><?php echo $each['ten'] ?></td>
							<td><img height="250" width="400" src="<?php echo $thu_muc_anh . $each['ten_ma_hoa'] ?>" alt="<?php echo $each['ten']?>"></td>
							<td width="20%"><a href="update_anh.php?ma=<?php echo $each['ma']?>"><center><img src="../../image/edit.png" width="30" height="30" /></center></a></td>
						</tr>
					<?php } ?>
				</table>
				<button style="margin-bottom: 20px;"></button>
			</div>
		</div>
		<?php mysqli_close($connect) ?>
		<?php include('../common/footer_admin.php') ?>
	</div>
	<script type="text/javascript" src="../../include/JS/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../../include/JS/menu.js"></script>
</body>
</html>



