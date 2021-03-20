<?php include('../check_supper_admin.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm Admin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../CSS/admin.css">
	<link rel="stylesheet" href="../../CSS/user.css">
</head>
<body>
	<?php
	if(empty($_GET['action'])) header("location:../quan_ly_admin/");
	$action = $_GET['action'];
	include('../common/header_admin.php');
	include('../common/menu_admin.php');
	include('../../user/validate.php');
	?>
	<div class="div_tong" >
		<div class="div_content">
			<div class="insert_update kh">
				<button style="width: 100px;" class="quay_lai" onclick="window.history.back();">
					<i class="fa fa-reply"></i>Quay lại
				</button>
				<form action="process.php" method="post">
					<?php if(isset($_GET['error'])) { ?>
						<h3 style="color: red; opacity: 0.8; margin-top: 20px">
							<?php echo $_GET['error'] ?>
						</h3>
					<?php } ?>
					<input type="hidden" name="action" value="<?php echo $action ?>">
					<h1 style="text-align: center; padding-top: 5px">Thông tin của admin</h1>
					<span class="chu_do">*</span>
					<span>(bắt buộc điền)</span>
					<table width="100%">
						<tr>
							<td>
								<span class="in_dam">Tên Admin</span>
								<span class="chu_do">*</span> <br>
								<input type="text" name="ten" id="input_ho_ten" placeholder="Nhập tên khách hàng"> <br>
								<span id="error_ho_ten" class="span_error"></span>
							</td>
						</tr>
						<tr>
							<td>
								<span class="in_dam">Năm sinh :</span> <br>
								<select name="nam" id="select_nam" onchange="thay_doi_ngay_lon_nhat()">
									<?php
										  	$date = getdate();//lấy Y-m-d tại thời điểm chạy code 
										  	$nam_hien_tai = $date['year'];
										  	for($i = $nam_hien_tai; $i >= 1900; $i--) {?>
										  		<option><?php echo $i ?></option>
										  	<?php } ?>
										  </select>
										  <select name="thang" id="select_thang" onchange="thay_doi_ngay_lon_nhat()">
										  	<?php for($i = 1; $i <= 12; $i++) {?>
										  		<option><?php echo $i ?></option>
										  	<?php } ?>
										  </select>
										  <select name="ngay" id="select_ngay">
										  	<?php for($i = 1; $i <= 31; $i++) { ?>
										  		<option><?php echo $i ?></option>
										  	<?php } ?>
										  </select>
										</td>
									</tr>
									<tr>
										<td>
											<span class="in_dam">Giới tính : </span> &emsp;
											<input type="radio" name="gioi_tinh" value="1" checked>Nam &emsp;&emsp;&emsp;
											<input type="radio" name="gioi_tinh" value="0">Nữ
										</td>
									</tr>
									<tr>
										<td>
											<span class="in_dam">Số chứng minh nhân dân</span>
											<span class="chu_do">*</span><br>
											<input type="text" name="cmnd" placeholder="Nhập số chứng minh" id="input_cmnd"> <br>
											<span id="error_cmnd" class="span_error"></span>
										</td>
									</tr>
									<tr>
										<td>
											<span class="in_dam">Số điện thoại</span>
											<span class="chu_do">*</span><br>
											<input id="input_sdt" type="text" name="sdt" placeholder="Nhập số điện thoại"> <br>
											<span id="error_sdt" class="span_error"></span>

										</td>
									</tr>
									<tr>
										<td>
											<span class="in_dam">Email</span>
											<span class="chu_do">*</span> <br>
											<input type="email" name="email" id="input_email" placeholder="Nhập email"> <br>
											<span id="error_email" class="span_error"></span>
										</td>
									</tr>
									<tr>
										<td>
											<span class="in_dam">Mật khẩu</span>
											<span class="chu_do">*</span><br>
											<input type="text" name="mat_khau" id="input_mat_khau"> <br>
											<span id="error_mat_khau" class="span_error"></span>
										</td>
									</tr>
									<tr>
										<td>
											<button class="dang_ky" type="submit" onclick="return validate_form()">Thêm admin</button> 
										</td>
									</tr>
								</table>
							</form>
						</div>
					</div>
					<?php include('../common/footer_admin.php') ?>
				</div>
				<script type="text/javascript" src="../../include/JS/jquery-3.3.1.min.js"></script>
				<script type="text/javascript" src="../../include/JS/validate.js"></script>
				<script type="text/javascript" src="../../include/JS/menu.js"></script>
				<script type="text/javascript" src="../../include/JS/ngay_thang_nam_select.js"></script>
			</body>
			</html>



