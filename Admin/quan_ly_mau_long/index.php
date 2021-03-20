<?php include('../check_supper_admin.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản lý màu lông</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../CSS/admin.css">
	<link rel="stylesheet" href="../../CSS/user.css">
</head>
<body>
	<?php 
	require '../common/connect.php';
	$tim_kiem ='';
	if(isset($_GET['tim_kiem'])) $tim_kiem = trim($_GET['tim_kiem']);
	if(isset($_GET['action'])) $action = $_GET['action']; 
	if(isset($_GET['ma'])) $ma = $_GET['ma'];
	if(empty($_GET['action']) || empty($_GET['ma'])) header("location:../quan_ly_mau_long/?action=3&ma=mac_dinh");
	$sql = "select * from mau_long where mau_long.ten like '%$tim_kiem%' ORDER BY ma DESC";
	$result = mysqli_query($connect, $sql);
	$tong_so_mau_long = mysqli_num_rows($result);
	$so_mau_long_1_trang = 6;
	$tong_so_trang = ceil($tong_so_mau_long / $so_mau_long_1_trang);
	$trang_hien_tai = 1;
	if(isset($_GET['trang'])) $trang_hien_tai = $_GET['trang'];
	$so_mau_long_can_bo_qua = ($trang_hien_tai - 1) * $so_mau_long_1_trang;
	$sql = "$sql
	limit $so_mau_long_1_trang offset $so_mau_long_can_bo_qua";
	$result = mysqli_query($connect,$sql);
	?>
	<?php include('../common/header_admin.php') ?>
	<?php include('../common/menu_admin.php') ?>
	<div class="div_tong">
		<div class="div_content">
			<div class="all_table kh">
				<div class="div_1"> 
					<button class="quay_lai" onclick="window.history.back();"><i class="fa fa-reply"></i>Quay lại</button> <br>
					<div class="tong_san_pham">
						<h3>Có tất cả <?php echo $tong_so_mau_long ?> màu lông</h3>
						<button><a href="?action=1&ma=mac_dinh">Thêm màu lông</a></button>
					</div>
					<div class="tim_kiem">
						<form>
							<input type="hidden" name="action" value="3">
							<input type="hidden" name="ma" value="mac_dinh">
							<input type="search" placeholder="Nhập màu cần tìm" name="tim_kiem" value="<?php echo $tim_kiem ?>">
							<button type="submit"><i class="fa fa-search"></i></button>
						</form>
					</div>
					<?php if($action == 1 || $action == 2 || $action == 3) { ?> <!-- 1 = thêm ; 2 = sửa ; 3 = xem-->
					<?php if($action == 1) { ?> 
						<?php if($action == 1 && $ma == "") header("location:../quan_ly_mau_long/?action=3&ma=mac_dinh"); ?>
						<form action="process.php" method="post">
							<div class="div_them">
								<input type="hidden" name="action" value="<?php echo $action ?>">
								<table>
									<tr><td colspan="2"><h3>Thêm màu lông thú cưng</h3></td></tr>
									<tr>
										<td>Tên màu</td>
										<td>
											<input type="text" placeholder="Nhập màu cần thêm.." name="mau_long" id="input_mau_long"> <br>
											<span class="span_error" id="error_mau_long"></span>
										</td>
									</tr>
									<tr>
										<td colspan="2" style="text-align: center">
											<button  onclick="return validate_form()">Thêm</button> <br>
											<?php if(isset($_GET['error'])) { ?>
												<span style="color: red; opacity: 0.8; margin-top: 20px">
													<?php echo $_GET['error'] ?>
												</span>
											<?php } ?>
										</td>
									</tr>
								</table>
							</div>
						</form>
					<?php } elseif($action == 2){ ?>
						<?php
						if($action == 2 && $ma == "mac_dinh") header("location:../quan_ly_mau_long/?action=3&ma=mac_dinh");


						$sql_check_ma = "select ma from mau_long where ma = $ma";
						$result_check_ma = mysqli_query($connect, $sql_check_ma);
						$dem_ket_qua_check_ma = mysqli_num_rows($result_check_ma);
						if($dem_ket_qua_check_ma != 1) {
							echo "<script>alert('Không có mã màu lông này !');window.history.back(-1);</script>";
						}
						$sql_sua = "select * from mau_long where ma = '$ma'";
						$result_sua = mysqli_query($connect, $sql_sua);
						$each_sua = mysqli_fetch_array($result_sua)
						?>
						<form action="process.php" method="post">
							<input type="hidden" name="action" value="<?php echo $action ?>">
							<input type="hidden" name="ma" value="<?php echo $each_sua['ma'] ?>">
							<div class="div_sua">
								<table>
									<tr>
										<td colspan="2"><h3>Sửa màu lông thú cưng</h3></td>
									</tr>
									<tr>
										<td>Màu cũ bạn chọn</td>
										<td><input type="text" name="mau_long_cu" readonly value="<?php echo $each_sua['ten'] ?>"></td>
									</tr>
									<tr>
										<td>Sửa thành</td>
										<td>
											<input type="text" name="mau_long_moi" id="input_mau_long"> <br>
											<span class="span_error" id="error_mau_long"></span>
										</td>
									</tr>
									<tr>
										<td colspan="2" style="text-align: center">
											<button  onclick="return validate_form()">Sửa</button> <br>
											<?php if(isset($_GET['error'])) { ?><span style="color: red; margin-top: 20px"><?php echo $_GET['error'] ?></span><?php } ?>
										</td>
									</tr>
								</table>
							</div>
						</form>
					<?php } ?>
				<?php } elseif($action == 3) { header("location:../quan_ly_mau_long/?action=3&ma=mac_dinh"); ?>
			<?php } else echo "<script> window.location.replace('index.php');alert('Thao tác không hợp lệ !');</script>"; ?>
		</div>
		<div class="div_table">
			<table style="width: 85%;  margin: auto" border="1">
				<tr id="ROW1" style="text-align: center">
					<td width="75%"><h3>Tất cả màu lông</h3></td>
					<td><h3>Sửa màu lông</h3></td>
					<td><h3>Xoá màu lông</h3></td>
				</tr>
				<?php foreach ($result as $each) { ?>
					<tr>
						<td><?php echo $each['ten']; ?>	</td>
						<td><a href="?action=2&ma=<?php echo $each['ma'] ?>"><center><img src="../../image/edit.png" width="30" height="30" /></center></a></td>
						<?php 
						$ma = $each['ma'];
						$sql_ma = "select ma_mau_long from thu_cung where ma_mau_long = $ma";
						$result_ma = mysqli_query($connect, $sql_ma);
						$count = mysqli_num_rows($result_ma);
						?>
						<?php if($count == 0) { ?>
							<td><a href="process.php?action=0&ma=<?php echo $each['ma'] ?>"onclick="return confirm('Bạn chắc chắn muốn xoá màu này chứ?')"><center><i class="fa fa-trash-o" style="font-size:30px; color: red"></i></center></a> </td>
						<?php } ?>
					</tr>
				<?php } ?>
			</table>
			<?php if($trang_hien_tai > ($tong_so_trang + 1)) echo "<script> alert('Trang này không tồn tại !'); window.history.back(-1); </script>";?>
			<div class="div_so_trang">
				 
				<?php for($i = 1; $i <= $tong_so_trang; $i++) { ?>
					<a <?php if($trang_hien_tai == $i) { ?> class="active" <?php } ?> href="?action=3&ma=mac_dinh&trang=<?php echo $i ?><?php if(!empty($tim_kiem)){?>&tim_kiem=<?php echo $tim_kiem ?><?php } ?>">
						<?php echo $i ?>
					</a>
				<?php } ?>
				 
			</div>
			<button></button>
		</div>
	</div>
	<?php mysqli_close($connect) ?>
</div>
</div>
<?php include('../common/footer_admin.php') ?>
<script type="text/javascript" src="../../include/JS/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../../include/JS/menu.js"></script>
<script type="text/javascript">
	function removeAscent (str) {
		if (str === null || str === undefined) return str;
		str = str.toLowerCase();
		str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
		str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
		str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
		str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
		str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
		str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
		str = str.replace(/đ/g, "d");
		return str;
	}
	function validate_form() {
		let mau_long=document.getElementById('input_mau_long').value;
		let check_error = false;
		let regex_mau_long = /^[a-zA-Z ]{2,30}$/;
		if(mau_long.length == 0) {
			document.getElementById('error_mau_long').innerHTML='* Màu lông không được trống !';
			check_error= true;
		} 
		else {
			if(regex_mau_long.test(removeAscent(mau_long))){
				document.getElementById('error_mau_long').innerHTML='';
			}else{
				document.getElementById('error_mau_long').innerHTML='* Chỉ nhập chữ cái và khoảng trắng !';
				check_error= true;
			}
		}
		if(check_error == true) {
			return false;
		}
	}
</script>
</body>
</html>