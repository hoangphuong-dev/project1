<?php include('../check_supper_admin.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản lý nguồn gốc thú cưng</title>
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
	if(empty($_GET['action']) || empty($_GET['ma'])) header("location:../quan_ly_nguon_goc/?action=3&ma=mac_dinh");
	$sql = "select * from xuat_xu where xuat_xu.ten_quoc_gia like '%$tim_kiem%' ORDER BY ma DESC";
	$result = mysqli_query($connect, $sql);
	$tong_so_quoc_gia = mysqli_num_rows($result);
	$so_quoc_gia_1_trang = 6;
	$tong_so_trang = ceil($tong_so_quoc_gia / $so_quoc_gia_1_trang);
	$trang_hien_tai = 1;
	if(isset($_GET['trang'])) $trang_hien_tai = $_GET['trang'];
	$so_quoc_gia_can_bo_qua = ($trang_hien_tai - 1) * $so_quoc_gia_1_trang;
	$sql = "$sql
	limit $so_quoc_gia_1_trang offset $so_quoc_gia_can_bo_qua";
	$result = mysqli_query($connect,$sql);
	?>
	<?php include('../common/header_admin.php') ?>
	<?php include('../common/menu_admin.php') ?>
	<div class="div_tong" >
		<div class="div_content">
			<div class="all_table kh">
				<div class="div_1"> 
					<button class="quay_lai" onclick="window.history.back();"><i class="fa fa-reply"></i>Quay lại</button> <br>
					<div class="tong_san_pham">
						<h3>Có tất cả <?php echo $tong_so_quoc_gia ?> quốc gia</h3>
						<button><a href="?action=1&ma=mac_dinh">Thêm quốc gia</a></button>
					</div>
					<div class="tim_kiem">
						<form>
							<input type="hidden" name="action" value="3">
							<input type="hidden" name="ma" value="mac_dinh">
							<input type="search" placeholder="Nhập quốc gia cần tìm" name="tim_kiem" value="<?php echo $tim_kiem ?>">
							<button type="submit"><i class="fa fa-search"></i></button>
						</form>
					</div>
				</div>
				<?php if($action == 1 || $action == 2 || $action == 3) { ?> <!-- 1 = thêm ; 2 = sửa ; 3 = xem-->
				<?php if($action == 1) { ?> 
					<?php if($action == 1 && $ma == "") header("location:../quan_ly_nguon_goc/?action=3&ma=mac_dinh"); ?>
					<form action="process.php" method="post">
						<div class="div_them">
							<input type="hidden" name="action" value="<?php echo $action ?>">
							<table>
								<tr><td colspan="2"><h3>Thêm quốc gia </h3></td></tr>
								<tr>
									<td>Tên quốc gia</td>
									<td>
										<input type="text" placeholder="Nhập quốc gia cần thêm.." name="quoc_gia" id="input_xuat_xu"> <br>
										<span class="span_error" id="error_xuat_xu"></span>
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
					if($action == 2 && $ma == "mac_dinh") header("location:../quan_ly_nguon_goc/?action=3&ma=mac_dinh");

					$sql_check_ma = "select ma from xuat_xu where ma = $ma";
					$result_check_ma = mysqli_query($connect, $sql_check_ma);
					$dem_ket_qua_check_ma = mysqli_num_rows($result_check_ma);
					if($dem_ket_qua_check_ma != 1) {
						echo "<script>alert('Không có mã xuất xứ này !');window.history.back(-1);</script>";
					}

					$sql_sua = "select * from xuat_xu where ma = '$ma'";
					$result_sua = mysqli_query($connect, $sql_sua);
					$each_sua = mysqli_fetch_array($result_sua)
					?>
					<form action="process.php" method="post">
						<input type="hidden" name="action" value="<?php echo $action ?>">
						<input type="hidden" name="ma" value="<?php echo $each_sua['ma'] ?>">
						<div class="div_sua">
							<table>
								<tr>
									<td colspan="2"><h3>Sửa quốc gia </h3></td>
								</tr>
								<tr>
									<td>Quốc gia cũ bạn chọn</td>
									<td>
										<input type="text" name="quoc_gia_cu"readonly value="<?php echo $each_sua['ten_quoc_gia'] ?>" >
									</td>
								</tr>
								<tr>
									<td>Sửa thành</td>
									<td><input type="text" name="quoc_gia_moi" id="input_xuat_xu"><br><span class="span_error" id="error_xuat_xu"></span></td>
								</tr>
								<tr>
									<td colspan="2" style="text-align: center">
										<button  onclick="return validate_form()">Sửa</button> <br>
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
				<?php } ?>
			<?php } elseif($action == 3) {header("location:../quan_ly_nguon_goc/?action=3&ma=mac_dinh"); ?>
		<?php } else echo "<script> window.location.replace('index.php');alert('Thao tác không hợp lệ !');</script>"; ?>
		<div class="div_table">
			<span class="key_search"><?php if(isset($_GET['tim_kiem'])) echo "Từ khoá tìm kiếm : ". $tim_kiem;?> </span>
			<table style="width: 70%;  margin: auto" border="1">
				<tr id="ROW1" style="text-align: center">
					<td width="75%"><h3>Tất cả quốc gia</h3></td>
					<td><h3>Sửa quốc gia</h3></td>
					<td><h3>Xoá quốc gia</h3></td>
				</tr>
				<?php foreach ($result as $each) {?>
					<tr>
						<td>
							<?php echo $each['ten_quoc_gia']; ?>
						</td>
						<td>
							<a href="?action=2&ma=<?php echo $each['ma'] ?>"><center><img src="../../image/edit.png" width="30" height="30" /></center></a>
						</td>
						<?php 
						$ma = $each['ma'];
						$sql_ma = "select ma_xuat_xu from thu_cung where ma_xuat_xu = $ma";
						$result_ma = mysqli_query($connect, $sql_ma);
						$count = mysqli_num_rows($result_ma);
						?>
						<?php if($count == 0) { ?>
							<td><a href="process.php?action=0&ma=<?php echo $each['ma'] ?>"onclick="return confirm('Bạn chắc chắn muốn xoá quốc gia này chứ?')"><center><i class="fa fa-trash-o" style="font-size:30px; color: red"></i></center></a> </td>
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
		let xuat_xu=document.getElementById('input_xuat_xu').value;
		let check_error = false;
		let regex_xuat_xu = /^[a-zA-Z ]{2,30}$/;
		if(xuat_xu.length == 0) {
			document.getElementById('error_xuat_xu').innerHTML='* Tên quốc gia không được trống !';
			check_error= true;
		} 
		else {
			if(regex_xuat_xu.test(removeAscent(xuat_xu))){
				document.getElementById('error_xuat_xu').innerHTML='';
			}else{
				document.getElementById('error_xuat_xu').innerHTML='* Chỉ nhập chữ cái và khoảng trắng !';
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