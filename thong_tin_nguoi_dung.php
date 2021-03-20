<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Chỉnh sửa thông tin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="CSS/admin.css">
	<link rel="stylesheet" href="CSS/user.css">
	<style type="text/css" media="screen">
		.update_in4 {
			width: 90%;
			height: auto;
			opacity: 0.9;
			margin-top: 4px;
			padding: 50px;
		}
	</style>
</head>
<body>
	<?php
		$ma = $_SESSION['ma']; // lấy mã khách hàng từ phiên đăng nhập
		include('Admin/common/connect.php');
		if(isset($_GET['ma_loai_thu_cung'])) {
			$ma_loai_thu_cung = $_GET['ma_loai_thu_cung'];
			echo "<script> window.location.replace('../doAn1/?ma_loai_thu_cung=$ma_loai_thu_cung');</script>";
		}
		$sql = "select * from khach_hang where ma = $ma";
		$result = mysqli_query($connect, $sql);
		$each_khach_hang = mysqli_fetch_array($result);
		?>
		<?php include('include/head.php') ?>
		<?php include('include/menu.php') ?>
		<div class="div_tong" >
			<div class="div_content">
				<div class="update_in4 kh" style="margin: auto; width: 90%; float: none;">
					<form action="user/process_thong_tin_nguoi_dung.php" method="post">
						<h2>Chỉnh sửa chi tiết</h2>
						<?php if(isset($_GET['error'])) { ?>
							<p style="color: red; opacity: 0.8;text-align: center;">
								(<?php echo $_GET['error'] ?>)
							</p>
						<?php } ?>
						<input type="hidden" name="ma" value="<?php echo $ma ;?>">
						<table>
							<tr>
								<td style="width: 20%"><span class="in_dam">Họ tên :</span></td>
								<td style="width: 80%"><input type="text" name="ten" value=" <?php echo $each_khach_hang['ten'] ?> "></td>
							</tr>
							<tr>
								<td><span class="in_dam">Ngày sinh :</span></td>
								<td>
									<?php // xử lí ngày tháng lấy về sau đó cắt chuỗi
									$ngay_sinh = $each_khach_hang['ngay_sinh']; // PHP đang trả về dạng chuỗi
									$nam_cu = substr("$ngay_sinh", 0, 4); // 0:bắt đầu từ vị trí nào ; 4:dộ dài cần lấy (string)
									$thang_cu = substr("$ngay_sinh", 5,2);
									$ngay_cu = substr("$ngay_sinh", 8, 2);
									?>
									<select class="select_ngay_thang" name="nam" id="select_nam" onchange="thay_doi_ngay_lon_nhat()">
										<?php $date = getdate();//lấy Y-m-d tại thời điểm chạy code (mảng)
										$nam_hien_tai = $date['year'];
										for($i = $nam_hien_tai; $i >= 1900; $i--) {?>
											<option value="<?php echo $i ?>"<?php if($i == $nam_cu){echo "selected";} ?>><?php echo $i ?></option>
										<?php } ?>
									</select>
									<select class="select_ngay_thang" name="thang" id="select_thang" onchange="thay_doi_ngay_lon_nhat()">
										<?php for($i = 1; $i <= 12; $i++) {?>
											<option value="<?php echo $i ?>"<?php if($i == $thang_cu){echo "selected";} ?>><?php echo $i ?></option>
										<?php } ?>
									</select>
									<select class="select_ngay_thang" name="ngay" id="select_ngay">
										<?php for($i = 1; $i <= 31; $i++) {?>
											<option value="<?php echo $i ?>"<?php if($i == $ngay_cu){echo "selected";} ?>><?php echo $i ?></option>
										<?php } ?>
									</select>
								</td>
							</tr>
							<tr>
								<td><span class="in_dam">Số điện thoại :</span></td>
								<td><input type="text" name="sdt" value=" <?php echo $each_khach_hang['sdt'] ?>"></td>
							</tr>
							<tr>
								<td><span class="in_dam">Email :</span></td>
								<td><input type="email" name="email" value="<?php echo $each_khach_hang['email'] ?>"></td>
							</tr>
							<tr>
								<td><span class="in_dam">Mật khẩu :</span></td>
								<td><input type="text" name="mat_khau" value="<?php echo $each_khach_hang['mat_khau'] ?>"></td>
							</tr>
							<tr>
								<td><span class="in_dam">Địa chỉ :</span></td>
								<td><input type="text" name="dia_chi" value="<?php echo $each_khach_hang['dia_chi'] ?>"></td>
							</tr>
							<tr>
								<td colspan="2"><button class="dang_ky" type="submit">Lưu thông tin</button></td>
							</tr>
						</table>
					</form>
				</div> 
			</div>

			<?php include('include/footer.php') ?>
		</div>
		<script type="text/javascript" src="include/JS/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="include/JS/menu.js"></script>
		<script type="text/javascript" src="include/JS/ngay_thang_nam_select.js"></script>
		<script type="text/javascript" src="include/JS/a1.js"></script>
		<script type="text/javascript" src="include/JS/a2.js"></script>
		<script type="text/javascript" src="include/JS/a3.js"></script>
	</body>
	</html>