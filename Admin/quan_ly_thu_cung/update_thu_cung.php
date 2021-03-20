<?php include('../check_admin.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sửa thông tin thú cưng</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../CSS/admin.css">
	<link rel="stylesheet" href="../../CSS/user.css">
</head>
<body>
	<?php 
	include'../common/connect.php';
	if(empty($_GET['action']) || empty($_GET['ma']))header("location:../quan_ly_thu_cung/");
	$thu_muc_anh = '../../image/';
	$ma = $_GET['ma']; $action = $_GET['action']; 
	$sql_check_ma = "select ma from thu_cung where ma = $ma";
	$result_check_ma = mysqli_query($connect, $sql_check_ma);
	$dem_ket_qua_check_ma = mysqli_num_rows($result_check_ma);
	if($dem_ket_qua_check_ma != 1) {
		echo "<script> window.location.replace('index.php'); alert('Không có mã này !');</script>";
	}
	$sql_thu_cung = "select * from thu_cung where ma = '$ma'";
	$result_thu_cung = mysqli_query($connect,$sql_thu_cung);
	$each_thu_cung = mysqli_fetch_array($result_thu_cung);
	// lấy xuất xứ về 
	$sql_xuat_xu = "select * from xuat_xu";
	$result_xuat_xu = mysqli_query($connect,$sql_xuat_xu);
	// lấy lmàu lông về 
	$sql_mau_long = "select * from mau_long";
	$result_mau_long = mysqli_query($connect,$sql_mau_long);
	// lấy loại thú cưng về 
	$sql_loai_thu_cung = "select * from loai_thu_cung";
	$result_loai_thu_cung = mysqli_query($connect,$sql_loai_thu_cung);
	?>
	<div class="div_tong" >
		<?php include('../common/header_admin.php') ?>
		<?php include('../common/menu_admin.php') ?>
		<div class="div_content">
			<div class="insert_update kh">
				<form action="process.php" method="post" enctype="multipart/form-data">
					<?php if(isset($_GET['error'])) { ?>
						<h4 style="color: red; opacity: 0.8; margin-top: 20px">
							<?php echo $_GET['error'] ?>
						</h4>
					<?php } ?>
					<input type="hidden" name="ma" value="<?php echo $ma ;?>">
					<input type="hidden" name="action" value="<?php echo $action ;?>">
					<h1 style="text-align: center; padding-top: 5px">Sửa thú cưng</h1>
					<span class="chu_do">*</span>
					<span>(bắt buộc điền)</span>
					<table width="100%">
						<tr>
							<td>
								<span class="in_dam">Tên thú cưng</span>
								<span class="chu_do">*</span> <br>
								<input type="text" name="ten" placeholder="Nhập tên thú cưng" value="<?php echo $each_thu_cung['ten'] ?>">
							</td>
						</tr>
						<tr>
							<td>
								<input type="hidden" name="anh_cu" value="<?php echo $each_thu_cung['anh'] ?> ">
								<div style="width: 70%; height: 220px; border:1px solid #EFF6E0; border-radius: 3px">
									<div style="width: 45%; float: left; padding-top: 105px"><span class="in_dam">Ảnh cũ :</span></div>
									<div style="width:55%; float: left";>
										<img style="padding-top: 2px"  width="100%" height="215px" src="<?php echo $thu_muc_anh . $each_thu_cung['anh'] ?> " alt="Đây là ảnh thú cưng">
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="image-upload">
									<span class="in_dam">Chọn ảnh mới :</span>
									<label for="file-input"><i class="fa fa-camera"><span>Chỉnh sửa ảnh</span></i></label>
									<input type="file" name="anh_moi" id="file-input" accept="image/*">
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<span class="in_dam">Giá bán</span>
								<span class="chu_do">*</span><br>
								<input type="text" name="gia_ban" placeholder="Nhập giá bán" value="<?php echo $each_thu_cung['gia_ban'] ?>">
							</td>
						</tr>
						<tr>
							<td>
								<span class="in_dam">Đặc điểm</span>
								<span class="chu_do">*</span><br>
								<textarea name="dac_diem"><?php echo $each_thu_cung['dac_diem'] ?></textarea>
							</td>
						</tr>
						<tr>
							<td>
								<span class="in_dam">Cách chăm sóc</span>
								<span class="chu_do">*</span><br>
								<textarea name="cach_cham_soc"><?php echo $each_thu_cung['cach_cham_soc'] ?></textarea>
							</td>
						</tr>
						<tr>
							<td>
								<span class="in_dam">Xuất xứ</span> <br> 
								<select style="width: 70%" name="ma_xuat_xu">
									<?php foreach ($result_xuat_xu as $each_xuat_xu) : ?>
										<option value=" <?php echo $each_xuat_xu['ma'] ?> "
											<?php 
											if($each_xuat_xu['ma'] == $each_thu_cung['ma_xuat_xu']) {
												echo "selected";
											}
											?>
											>
											<?php echo $each_xuat_xu['ten_quoc_gia'] ?>
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
										<option value=" <?php echo $each_mau_long['ma'] ?> "
											<?php 
											if($each_mau_long['ma'] == $each_thu_cung['ma_mau_long']) {
												echo "selected";
											}
											?>
											>
											<?php echo $each_mau_long['ten'] ?>
										</option>
									<?php endforeach ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<span class="in_dam">Giống: </span> &emsp;
								<input type="radio" name="gioi_tinh" value="1" <?php echo ($each_thu_cung['gioi_tinh'] == 1) ? 'checked' : ''; ?> />Đực &emsp;&emsp;&emsp;
								<input type="radio" name="gioi_tinh" value="0" <?php echo ($each_thu_cung['gioi_tinh'] == 0) ? 'checked' : ''; ?> />Cái
							</td>
						</tr>
						<tr>
							<td>
								<span class="in_dam">Cân nặng nhỏ nhất :</span> <br>
								<input type="text" name="can_nang_nho_nhat" placeholder="Vd : 20 - 25kg" value="<?php echo $each_thu_cung['can_nang_nho_nhat'];?>">

							</td>
						</tr>
						<tr>
							<td>
								<span class="in_dam">Cân nặng lớn nhất :</span> <br>
								<input type="text" name="can_nang_lon_nhat" placeholder="Vd : 20 - 25kg" value="<?php echo $each_thu_cung['can_nang_lon_nhat']; ?>">

							</td>
						</tr>
						<tr>
							<td>
								<span class="in_dam">Loại thú cưng</span> <br> 
								<select style="width: 70%" name="ma_loai_thu_cung">
									<?php foreach ($result_loai_thu_cung as $each_loai_thu_cung) : ?>
										<option value=" <?php echo $each_loai_thu_cung['ma'] ?> "
											<?php 
											if($each_loai_thu_cung['ma'] == $each_thu_cung['ma_loai_thu_cung']) {
												echo "selected";
											}
											?>
											>
											<?php echo $each_loai_thu_cung['ten'] ?>
										</option>
									<?php endforeach ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<button class="dang_ky" type="submit">Sửa thú cưng</button> 
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



