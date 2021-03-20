<?php include('../check_admin.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sửa trang giới thiệu</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../CSS/admin.css">
	<link rel="stylesheet" href="../../CSS/user.css">
	<link rel="stylesheet" href="chinh_anh.css">
</head>
<body>
	<?php
	include('../common/header_admin.php');
	include('../common/menu_admin.php');
	require '../common/connect.php';
	$thu_muc_anh = '../../image/';
	$sql = "select * from gioi_thieu";
	$result = mysqli_query($connect,$sql);
	$each = mysqli_fetch_array($result);
	?>
	<div class="div_tong" >
		<div class="div_content">
			<div class="kh">
				<button class="quay_lai" onclick="window.history.back();">
					<i class="fa fa-reply"></i>Quay lại
				</button>
				<form action="process.php" method="post" enctype="multipart/form-data" style="opacity: 1">
					<h1>Sửa trang giới thiệu</h1>
					<table >
						<tr>
							<td style="width: 20%;">Tiêu đề :</td>
							<td><input type="text" name="tieu_de" value="<?php echo $each['tieu_de']?>"></td>
						</tr>
						<tr>
							<td>Nội dung :</td>
							<td><textarea name="noi_dung"><?php echo $each['noi_dung']?></textarea></td>
						</tr>
						<tr>
							<td>Ảnh cũ :</td>
							<td>
								<input type="hidden" name="anh_cu" value="<?php echo $each['anh'] ?> ">
								<div class="div_anh"><img src="<?php echo $thu_muc_anh . $each['anh'] ?> " alt="Ảnh giới thiệu"></div>
							</td>
						</tr>
						<tr>
							<td>Hoặc chọn ảnh mới :</td>
							<td>
								<div class="image-upload">
									<label for="file-input"><i class="fa fa-camera" style="margin:5% 0 5% 0"><span>Chỉnh sửa ảnh</span></i></label>
									<input type="file" name="anh_moi" id="file-input" accept="image/*">
								</div>
							</td>
						</tr>
						<tr>
							<td>Nội dung ảnh :</td>
							<td><textarea name="noi_dung_anh"><?php echo $each['noi_dung_anh']?></textarea></td>
						</tr>
						<tr>
							<td colspan="2">
								<button class="dang_ky" type="submit">Sửa thông tin</button>
							</td>
						</tr>
					</table>
				</form>
			</div>
			<p class="huong_dan">
				Hướng dẫn điền form :
				<p class="hd_chi_tiet">
					<i class="fa fa-send-o"></i> Form đang hiển thị lại thông tin của trang giới thiệu bên phía người dùng. <br>
					<i class="fa fa-send-o"></i> Nếu bạn muốn thay đổi nội dung hãy sửa lại từng thông tin về tiêu đề và ảnh sau đó ấn sửa thông tin.
				</p>
			</p>
			
		</div>
		<?php include('../common/footer_admin.php') ?>
	</div>
	<script type="text/javascript" src="../../include/JS/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../../include/JS/menu.js"></script>
</body>
</html>