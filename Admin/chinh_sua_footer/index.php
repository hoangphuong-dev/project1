<?php include('../check_admin.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sửa footer</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../CSS/admin.css">
	<link rel="stylesheet" href="../../CSS/user.css">
	<link rel="stylesheet" href="../quan_ly_trang_gioi_thieu/chinh_anh.css">
</head>
<body>
	<?php
	include('../common/header_admin.php');
	include('../common/menu_admin.php');
	require '../common/connect.php';
	$thu_muc_anh = '../../image/';
	$sql = "select * from footer";
	$result = mysqli_query($connect,$sql);
	$each = mysqli_fetch_array($result);
	?>
	<div class="div_tong" >
		<div class="div_content">
			<div class="kh">
				<button class="quay_lai" onclick="window.history.back();">
					<i class="fa fa-reply"></i>Quay lại
				</button>
				<form action="process.php" method="post" enctype="multipart/form-data">
					<h1>Chỉnh sửa footer</h1>
					<table>
						<tr>
							<td style="width: 20%;">Địa chỉ : </td>
							<td><input type="text" name="dia_chi" value="<?php echo $each['dia_chi']?>"></td>
						</tr>
						<tr>
							<td>Số điện thoại : </td>
							<td><input type="text" name="sdt" value="<?php echo $each['sdt']?>"></td>
						</tr>
						<tr>
							<td>Email : </td>
							<td><input type="text" name="email" value="<?php echo $each['email']?>"></td>
						</tr>
						<tr>
							<td>Link Facebook : </td>
							<td><input type="text" name="link_facebook" value="<?php echo $each['link_facebook']?>"></td>
						</tr>
						<tr>
							<td>Link Youtube : </td>
							<td><input type="text" name="link_youtube" value="<?php echo $each['link_youtube']?>"></td>
						</tr>
						<tr>
							<td>Link Twitter: </td>
							<td><input type="text" name="link_twitter" value="<?php echo $each['link_twitter']?>"></td>
						</tr>
						<tr>
							<td colspan="2">
								<button class="dang_ky" type="submit">Sửa thông tin</button>
							</td>
						</tr>
					</table>
				</form>
				<button></button>
			</div>
		</div>
		<?php include('../common/footer_admin.php') ?>
	</div>
	<script type="text/javascript" src="../../include/JS/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../../include/JS/menu.js"></script>
</body>
</html>