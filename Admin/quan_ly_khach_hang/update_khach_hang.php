<?php include('../check_admin.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sửa thông tin khách hàng</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../CSS/admin.css">
	<link rel="stylesheet" href="../../CSS/user.css">
</head>
<body>
	<?php 
	require '../common/connect.php';
	if(empty($_GET['ma']))header("location:../quan_ly_khach_hang/");
	$ma = $_GET['ma'];
	$sql_check_ma = "select ma from khach_hang where ma = $ma";
	$result_check_ma = mysqli_query($connect, $sql_check_ma);
	$dem_ket_qua_check_ma = mysqli_num_rows($result_check_ma);
	if($dem_ket_qua_check_ma != 1) {
		echo "<script> window.location.replace('index.php'); alert('Không có mã này !');</script>";
	}
	$sql = "select * from khach_hang where ma = '$ma'";
	$result = mysqli_query($connect,$sql);
	$each = mysqli_fetch_array($result);
	?>
	<div class="div_tong" >
		<?php include('../common/header_admin.php') ?>
		<?php include('../common/menu_admin.php') ?>
		<div class="div_content">
			<div class="insert_update kh">
				<button style="width: 100px;" class="quay_lai" onclick="window.history.back();">
					<i class="fa fa-reply"></i>Quay lại
				</button>
				<form action="process.php" method="post">
					<?php if(isset($_GET['error'])) { ?>
						<h4 style="color: red; opacity: 0.8; margin-top: 20px">
							<?php echo $_GET['error'] ?>
						</h4>
					<?php } ?>
					<input type="hidden" name="ma" value="<?php echo $ma ;?>">
					<input type="hidden" name="action" value="<?php echo $action ;?>">
					<h1 style="text-align: center; padding-top: 5px">Sửa thông tin khách hàng</h1>
					<span class="chu_do">*</span>
					<span>(bắt buộc điền)</span>
					<table width="100%">
						<tr>
							<td>
								<span class="in_dam">Tên khách hàng</span> <br>
								<input type="text" name="ten" value=" <?php echo $each['ten'] ?> " >
							</td>
						</tr>
						<tr>
							<td>
								<span class="in_dam">Năm sinh :</span> <br>
									<?php // xử lí ngày tháng lấy về sau đó cắt chuỗi 
									$ngay_sinh = $each['ngay_sinh']; // PHP đang trả về dạng chuỗi
									$nam_cu = substr("$ngay_sinh", 0, 4); // 0:bắt đầu từ vị trí nào ; 4:dộ dài cần lấy (string)
									$thang_cu = substr("$ngay_sinh", 5,2); 
									$ngay_cu = substr("$ngay_sinh", 8, 2); 
									?>
									<select name="nam" id="select_nam" onchange="thay_doi_ngay_lon_nhat()">
										<?php
									  	$date = getdate();//lấy Y-m-d tại thời điểm chạy code (mảng)
									  	$nam_hien_tai = $date['year'];
									  	for($i = $nam_hien_tai; $i >= 1900; $i--) {?>
									  		<option value="<?php echo $i ?>"<?php if($i == $nam_cu){echo "selected";} ?>><?php echo $i ?></option>
									  	<?php } ?>
									  </select>
									  <select name="thang" id="select_thang" onchange="thay_doi_ngay_lon_nhat()">
									  	<?php for($i = 1; $i <= 12; $i++) {?>
									  		<option value="<?php echo $i ?>"<?php if($i == $thang_cu){echo "selected";} ?>><?php echo $i ?></option>
									  	<?php } ?>
									  </select>
									  <select name="ngay" id="select_ngay">
									  	<?php for($i = 1; $i <= 31; $i++) {?>
									  		<option value="<?php echo $i ?>"<?php if($i == $ngay_cu){echo "selected";} ?>><?php echo $i ?></option>
									  	<?php } ?>
									  </select>
									</td>
								</tr>
								<tr>
									<td>
										<span class="in_dam">Giới tính</span>
										<input type="radio" name="gioi_tinh" value="1" <?php echo ($each['gioi_tinh'] == 1) ? 'checked' : ''; ?> />Nam &emsp;&emsp;&emsp;
										<input type="radio" name="gioi_tinh" value="0" <?php echo ($each['gioi_tinh'] == 0) ? 'checked' : ''; ?> /> Nữ
									</td>
								</tr>
								<tr>
									<td>
										<span class="in_dam">Số điện thoại</span>
										<span class="chu_do">*</span><br>
										<input type="text" name="sdt" placeholder="Nhập số điện thoại" value=" <?php echo $each['sdt'] ?>" required>
									</td>
								</tr>
								<tr>
									<td>
										<span class="in_dam">Email</span> <br>
										<input type="email" name="email" value=" <?php echo $each['email'] ?>" placeholder="Nhập email">
									</td>
								</tr>
								<tr>
									<td>
										<span class="in_dam">Mật khẩu</span>
										<span class="chu_do">*</span><br>
										<input type="text" name="mat_khau" value=" <?php echo $each['mat_khau'] ?>">
									</td>
								</tr>
								<tr>
									<td>
										<span class="in_dam">Địa chỉ</span>
										<span class="chu_do">*</span><br>
										<input type="text" name="dia_chi" value=" <?php echo $each['dia_chi'] ?>">
									</td>
								</tr>
								<tr>
									<td>
										<button class="dang_ky" type="submit">Sửa thông tin</button> 
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
			<script type="text/javascript" src="../../include/JS/ngay_thang_nam_select.js"></script>
		</body>
		</html>