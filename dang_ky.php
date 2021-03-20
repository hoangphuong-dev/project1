<?php session_start()?>
<!DOCTYPE html>
<html>
<head>
	<title>Đăng ký tài khoản</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="CSS/admin.css">
	<link rel="stylesheet" href="CSS/user.css">
	<style type="text/css" media="screen">
		.insert_update form {
			width: 80%;padding: 5px 0 20px 20px;
		}
		.insert_update h2 {
			text-align: center;margin: 60px 0 35px 0;
		}
		.insert_update input[type=submit] {
			margin-left: 40%;
		}
	</style>
</head>
<body>
	<?php
	if(!empty($_SESSION)) {
		echo "<script> window.location.replace('index.php'); alert('Bạn đã đăng nhập rồi !'); </script>";
		exit();
	} else {
		include('include/head.php');
		include('include/menu.php');
		include('Admin/common/connect.php');
		if(isset($_GET['ma_loai_thu_cung'])) {
			$ma_loai_thu_cung = $_GET['ma_loai_thu_cung'];
			echo "<script> window.location.replace('../doAn1/?ma_loai_thu_cung=$ma_loai_thu_cung');</script>";
		}
		include('user/validate.php');
		if(isset($_POST['submit'])) { // nếu gửi form lên thì backend xử lý
			if($ten_loi == "" && $email_loi == "" && $dien_thoai_loi == "" && $mat_khau_loi == "" && $dia_chi_loi == "") {
				date_default_timezone_set('Asia/Ho_Chi_Minh');
				include('Admin/common/connect.php');
				$nam = $_POST['nam']; // lấy năm sinh 
				$thang = $_POST['thang']; // lấy tháng sinh
				$ngay = $_POST['ngay']; // lấy ngày sinh
				$ngay_sinh = $nam.'-'.$thang.'-'.$ngay;
				$gioi_tinh = $_POST['gioi_tinh'];
				$ngay_dang_ky = date("Y-m-d H-i-s");
				$select_tinh = $_POST['select_tinh'];
				$select_huyen = $_POST['select_huyen'];
				$dia_chi = $so_nha.' - '.$select_huyen.' - '.$select_tinh;
				$sql_checkmail = "select email from khach_hang where email = '$email'";
				$result_checkmail = mysqli_query($connect, $sql_checkmail);
				$dem_ket_qua = mysqli_num_rows($result_checkmail);
					if($dem_ket_qua == 0) { // chưa có email này trong database
						$sql = "insert into khach_hang(ten,ngay_sinh,gioi_tinh,sdt,email,mat_khau,dia_chi,ngay_dang_ky) values('$ten','$ngay_sinh','$gioi_tinh','$sdt','$email','$mat_khau','$dia_chi','$ngay_dang_ky')";
						// die($sql);
						mysqli_query($connect,$sql);
						echo "<script> window.location.replace('dang_ky.php?success=Đăng ký thành công. Vui lòng đăng nhập !');</script>";
					} else echo "<script> window.location.replace('dang_ky.php?loi=Email này đã tồn tại. Vui lòng đăng kí email khác !');</script>";
				}
			}
		}  
		?> 
		<div class="div_tong">
			<div class="div_content">
				<div class="insert_update kh">
					<form method="post">
						<?php if(isset($_GET['loi'])) { ?>
							<h4 style="color: red; opacity: 0.8; margin-top: 20px"><?php echo $_GET['loi'] ?></h4>
						<?php } ?>
						<h2>Đăng ký tài khoản</h2>
						<span class="chu_do">*</span><span>(bắt buộc điền)</span>
						<table width="100%">
							<tr>
								<td style="width: 20%"><span class="in_dam">Họ tên : </span><span class="chu_do">*</span></td>
								<td>
									<input type="text" name="ten" placeholder="Nhập tên khách hàng" value="<?php if(isset($ten)) echo $ten ?>">
									<span class="span_error"><?php echo $ten_loi; ?> </span>  
								</td>
							</tr>
							<tr>
								<td><span class="in_dam">Ngày sinh :</span></td>
								<td>
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
							<td><span class="in_dam">Giới tính : </span> &emsp;</td>
							<td>
								<input type="radio" name="gioi_tinh" value="1">Nam &emsp;&emsp;&emsp;
								<input type="radio" name="gioi_tinh" value="0" checked >Nữ 
							</td>
						</tr>
						<tr>
							<td><span class="in_dam">Số điện thoại : </span><span class="span_error">*</span></td>
							<td>
								<input type="text" name="sdt" placeholder="Nhập số điện thoại" value="<?php if(isset($sdt)) echo $sdt ?>">
								<span class="span_error"><?php echo $dien_thoai_loi; ?></span>
							</td>
						</tr>
						<tr>
							<td><span class="in_dam">Email : </span><span class="span_error">*</span></td>
							<td>
								<input type="email" name="email" placeholder="Nhập email" value="<?php if(isset($email)) echo $email ?>">
								<span class="span_error"><?php echo $email_loi; ?> </span>  
							</td>
						</tr>
						<tr>
							<td><span class="in_dam">Mật khẩu : </span><span class="span_error">*</span></td>
							<td>
								<input type="text" name="mat_khau" placeholder="Nhập mật khẩu">
								<span class="span_error"><?php echo $mat_khau_loi; ?> </span> 
							</td>
						</tr>
						<tr>
							<td><span class="in_dam">Địa chỉ giao hàng : </span><span class="span_error">*</span></td>
							<td>
								<input type="text" name="dia_chi" placeholder="Nhập số nhà" value="<?php if(isset($dia_chi)) echo $dia_chi ?>">
								<span class="span_error"><?php echo $dia_chi_loi; ?> </span> 
							</td>
						</tr>
						<tr>
							<td><span class="in_dam">Chọn : </span><span class="span_error">*</span></td>
							<td>
								<div style="width: 70%; height: 100%;">
									<div style="width: 50%; height: 100%; float: left;">
										<span class="in_dam">Tỉnh/Thành phố :</span>
										<select style="width: 90%" name="select_tinh"></select>
									</div>
									<div style="width: 50%; height: 100%; float: left;">
										<span class="in_dam">Quận/Huyện :</span>
										<select style="width: 100%" name="select_huyen"></select>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" name="submit" value="Đăng ký"></input></td>
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