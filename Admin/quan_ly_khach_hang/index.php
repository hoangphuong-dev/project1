<?php include('../check_admin.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản lý khách hàng</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../CSS/admin.css">
	<link rel="stylesheet" href="../../CSS/user.css">
</head>
<body>
	<?php 
	require '../common/connect.php';
	$tim_kiem ='';
	if(isset($_GET['tim_kiem'])) $tim_kiem = trim($_GET['tim_kiem']);
	$sql = "select * from khach_hang
	where khach_hang.ten like '%$tim_kiem%'
	or khach_hang.ngay_sinh like '%$tim_kiem%'
	or khach_hang.sdt like '%$tim_kiem%'
	or khach_hang.dia_chi like '%$tim_kiem%'";
	$result = mysqli_query($connect,$sql);
	$tong_so_khach_hang = mysqli_num_rows($result);
	$so_khach_hang_1_trang = 10;
	$tong_so_trang = ceil($tong_so_khach_hang / $so_khach_hang_1_trang);
	$trang_hien_tai = 1;
	if(isset($_GET['trang'])) $trang_hien_tai = $_GET['trang'];
	$so_khach_hang_can_bo_qua = ($trang_hien_tai - 1) * $so_khach_hang_1_trang;
	$sql = "$sql
	limit $so_khach_hang_1_trang offset $so_khach_hang_can_bo_qua";
	$result = mysqli_query($connect,$sql);
	?>
	<?php include('../common/header_admin.php') ?>
	<?php include('../common/menu_admin.php') ?>
	<div class="div_tong" >
		<div class="div_content">
			<div class="all_table kh">
				<button class="quay_lai" onclick="window.history.back();">
					<i class="fa fa-reply"></i>Quay lại
				</button> <br>
				<div class="div_1">
					<div class="tong_san_pham">
						<h3>
							Có tất cả <?php echo $tong_so_khach_hang ?> khách hàng
						</h3>
						<p>
							<?php 
							if(isset($_GET['tim_kiem'])) {
								echo "Từ khoá tìm kiếm :". $tim_kiem;
							}
							?>
						</p>
					</div>
					<div class="tim_kiem">
						<form>
							<input type="search" placeholder="Tên, ngày sinh, sdt, địa chỉ ..." name="tim_kiem" value="<?php echo $tim_kiem ?>">
							<button type="submit"><i class="fa fa-search"></i></button>
						</form>
					</div>
				</div>
				<div class="div_table">
					<table width="100%" border="1">
						<tr id="ROW1">
							<td>Tên khách hàng</td>
							<td>Ngày sinh</td>
							<td>Giới tính</td>
							<td>Số điện thoại</td>
							<td>Email</td>
							<td>Địa chỉ</td>
							<td>Ngày đăng ký</td>
							<td>Sửa thông tin</td>
							
							<?php foreach ($result as $each): ?>	
								<tr>
									<td><?php echo $each['ten']?></td>
									<td width="90px"><?php echo date_format(date_create($each['ngay_sinh']),'d-m-Y')  ?></td>
									<td>
										<?php 
										if($each['gioi_tinh'] == 1) { echo "Nam";} 
										else { echo "Nữ"; }
										?>
									</td>
									<td><?php echo $each['sdt']?></td>
									<td><?php echo $each['email']?></td>
									<td><?php echo $each['dia_chi']?></td>
									<td><?php echo date_format(date_create($each['ngay_dang_ky']),'d-m-Y H:i:s')?></td>
									<td width="70px">
										<a href="update_khach_hang.php?ma=<?php echo $each['ma'] ?>"><center><img src="../../image/edit.png" width="30" height="30" /></center></a>
									</td>
								</tr>
							</tr>
						<?php endforeach?>	
					</table>
				</div>
				<?php if($trang_hien_tai > ($tong_so_trang + 1)) echo "<script> alert('Trang này không tồn tại !'); window.history.back(-1); </script>";?>
				<div class="div_so_trang">
					 
					<?php for($i = 1; $i <= $tong_so_trang; $i++) { ?>
						<a <?php if($trang_hien_tai == $i) { ?> class="active" <?php } ?> href="?trang=<?php echo $i ?><?php if(!empty($tim_kiem)){?>&tim_kiem=<?php echo $tim_kiem ?><?php } ?>">
							<?php echo $i ?>
						</a>
					<?php } ?>
					 
				</div>
				<button></button>
			</div>
			<?php mysqli_close($connect) ?>
		</div>
		<?php include('../common/footer_admin.php') ?>
	</div>
	<script type="text/javascript" src="../../include/JS/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../../include/JS/menu.js"></script>
</body>
</html>