<?php include('../check_admin.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm thú cưng</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../CSS/admin.css">
	<link rel="stylesheet" href="../../CSS/user.css">
</head>
<body>
	<?php 
	if(empty($_GET['action'])) header("location:../quan_ly_thu_cung/");
	$action = $_GET['action'];
	include('../common/header_admin.php');
	include('../common/menu_admin.php');
	include'../common/connect.php';
	$sql_loai_thu_cung = "select * from loai_thu_cung";
	$result_loai_thu_cung = mysqli_query($connect,$sql_loai_thu_cung);
	$each_loai_thu_cung = mysqli_fetch_array($result_loai_thu_cung);
					// sql lấy xuat_xu
	$sql_xuat_xu = "select * from xuat_xu";
	$result_xuat_xu = mysqli_query($connect,$sql_xuat_xu);
	$each_xuat_xu = mysqli_fetch_array($result_xuat_xu);
					// sql lấy mau_long
	$sql_mau_long = "select * from mau_long";
	$result_mau_long = mysqli_query($connect,$sql_mau_long);
	$each_mau_long = mysqli_fetch_array($result_mau_long);
	?>
	<div class="div_tong" >
		<div class="div_content">
			<div class="insert_update kh">
				<form action="process.php" method="post" enctype="multipart/form-data">
					<?php if(isset($_GET['error'])) { ?>
						<h4 style="color: red; opacity: 0.8; margin-top: 20px">
							<?php echo $_GET['error'] ?>
						</h4>
					<?php } ?>
					<input type="hidden" name="action" value="<?php echo $action ?>">
					<h1 style="text-align: center; padding-top: 5px">Thêm thú cưng</h1>
					<span class="chu_do">*</span>
					<span>(bắt buộc điền)</span>
					<table width="100%">
						<tr>
							<td>
								<span class="in_dam">Tên thú cưng</span>
								<span class="chu_do">*</span> <br>
								<input type="text" name="ten" placeholder="Nhập tên thú cưng" id="input_ho_ten">
								<span id="error_ho_ten" class="span_error"></span>
							</td>
						</tr>
						<tr>
							<td>
								<div class="image-upload">
									<span class="in_dam">Chọn ảnh :</span>
									<label for="file-input"><i class="fa fa-camera"><span>Chọn ảnh</span></i></label>
									<input type="file" name="anh" id="file-input" accept="image/*">
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<span class="in_dam">Giá bán</span> 
								<span class="chu_do">*</span><br>
								<input type="text" name="gia_ban" placeholder="Nhập giá bán" id="input_gia_ban">
								<span id="error_gia_ban" class="span_error"></span>
							</td>
						</tr>
						<tr>
							<td>
								<span class="in_dam">Đặc điểm</span>
								<span class="chu_do">*</span><br>
								<textarea name="dac_diem" id="input_dac_diem"></textarea>
								<span id="error_dac_diem" class="span_error"></span>
							</td>
						</tr>
						<tr>
							<td>
								<span class="in_dam">Cách chăm sóc</span>
								<span class="chu_do">*</span><br>
								<textarea name="cach_cham_soc" id="input_cham_soc"></textarea>
								<span id="error_cham_soc" class="span_error"></span>
							</td>
						</tr>
						<tr>
							<td>
								<span class="in_dam">Xuất xứ</span> <br>
								<select style="width: 70%" name="ma_xuat_xu">
									<?php foreach ($result_xuat_xu as $each_xuat_xu) : ?>
										<option value=" <?php echo $each_xuat_xu['ma']?> ">
											<?php echo $each_xuat_xu['ten_quoc_gia']?>
										</option>
									<?php endforeach ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<span class="in_dam">Màu lông</span> <br>
								<select style="width: 70%" name="ma_mau_long">
									<?php foreach ($result_mau_long as $each_mau_long) : ?>
										<option value=" <?php echo $each_mau_long['ma']?> ">
											<?php echo $each_mau_long['ten'] ?>
										</option>
									<?php endforeach ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<span class="in_dam">Giới tính : </span> &emsp;
								<input type="radio" name="gioi_tinh" value="1" checked>Đực &emsp;&emsp;&emsp;
								<input type="radio" name="gioi_tinh" value="0">Cái
							</td>
						</tr>
						<tr>
							<td>
								<span class="in_dam">Cân nặng nhỏ nhất :</span>
								<span class="chu_do">*</span><br>
								<input type="text" name="can_nang_nho_nhat" id="input_can_nang_min">
								<span id="error_can_nang_min" class="span_error"></span>
							</td>
						</tr>
						<tr>
							<td>
								<span class="in_dam">Cân nặng lớn nhất :</span>
								<span class="chu_do">*</span><br>
								<input type="text" name="can_nang_lon_nhat" id="input_can_nang_max">
								<span id="error_can_nang_max" class="span_error"></span>
							</td>
						</tr>
						<tr>
							<td>
								<span class="in_dam">Loại thú cưng</span> <br>
								<select style="width: 70%" name="ma_loai_thu_cung">
									<?php foreach ($result_loai_thu_cung as $each_loai_thu_cung) : ?>
										<option value=" <?php echo $each_loai_thu_cung['ma']?> ">
											<?php echo $each_loai_thu_cung['ten']?>
										</option>
									<?php endforeach ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<button class="dang_ky" type="submit" onclick="return validate_form()">Thêm thú cưng</button> 
							</td>
						</tr>
					</table>
				</form>
			</div>
			<?php mysqli_close($connect) ?>
		</div>
		<?php include('../common/footer_admin.php') ?>
	</div>
	<script type="text/javascript" src="../../include/JS/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../../include/JS/menu.js"></script>
	<script type="text/javascript" src="validate.js"></script>
</body>
</html>



