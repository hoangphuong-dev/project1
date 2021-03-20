<?php include('../check_admin.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Chỉnh sửa ảnh</title>
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
	if(empty($_GET['ma'])) echo "<script> window.location.replace('../quan_ly_anh/');</script>";
	$ma = $_GET['ma'] ?? ''; // lấy mã của admin trên thanh địa chỉ
	$sql = "select * from anh where ma = '$ma'";
	$result = mysqli_query($connect,$sql);
	$count = mysqli_num_rows($result);
	if($count != 1) echo "<script> window.location.replace('../quan_ly_anh/'); alert('Không có mã này !');</script>";
	$each = mysqli_fetch_array($result);
	?>
	<div class="div_tong" >
		<div class="div_content">
			<div class="kh">
				<button class="quay_lai" onclick="window.history.back();">
					<i class="fa fa-reply"></i>Quay lại
				</button>
				<form action="process_update_anh.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="ma" value="<?php echo $ma?>">
					<h1>Chỉnh sửa ảnh</h1>
					<table>
						<tr>
							<td style="width: 20%;">Tên ảnh :</td>
							<td><input type="text" name="ten" readonly value="<?php echo $each['ten']?>"></td>
						</tr>
						<tr>
							<td>Ảnh cũ :</td>
							<td>
								<input type="hidden" name="anh_cu" value="<?php echo $each['ten_ma_hoa'] ?> ">
								<div class="div_anh"><img src="<?php echo $thu_muc_anh . $each['ten_ma_hoa'] ?>" alt="<?php echo $each['ten']?>"></div>
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
							<td colspan="2">
								<button class="dang_ky" type="submit">Đổi ảnh</button>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
		<?php include('../common/footer_admin.php') ?>
	</div>
	<script type="text/javascript" src="../../include/JS/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../../include/JS/menu.js"></script>
</body>
</html>