<?php include('../check_supper_admin.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản lí Admin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../CSS/admin.css">
	<link rel="stylesheet" href="../../CSS/user.css">
</head>
<body>
	<?php 
	require '../common/connect.php';
	$tim_kiem ='';
	if(isset($_GET['tim_kiem'])) $tim_kiem = trim($_GET['tim_kiem']);
		// lấy tất cả admin
	$sql = "select * from admin
	where admin.ten like '%$tim_kiem%'
	or admin.ngay_sinh like '%$tim_kiem%'
	or admin.sdt like '%$tim_kiem%'";
	$result = mysqli_query($connect,$sql);
	$tong_so_admin = mysqli_num_rows($result);
	$so_admin_1_trang = 5;
	$tong_so_trang = ceil($tong_so_admin / $so_admin_1_trang);
	$trang_hien_tai = 1;
	if(isset($_GET['trang'])) $trang_hien_tai = $_GET['trang'];
	$so_admin_can_bo_qua = ($trang_hien_tai - 1) * $so_admin_1_trang;
	$sql = "$sql
	limit $so_admin_1_trang offset $so_admin_can_bo_qua";
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
							Có tất cả <?php echo $tong_so_admin ?> admin
						</h3>
						<p><?php if(isset($_GET['tim_kiem'])) echo "Từ khoá tìm kiếm :". $tim_kiem; ?></p>
					</div>
					<div class="tim_kiem">
						<form>
							<input type="search" placeholder="Tên, ngày sinh, sdt ..." name="tim_kiem" value="<?php echo $tim_kiem ?>">
							<button type="submit">
								<i class="fa fa-search"></i>
							</button>
						</form>
					</div>
				</div>
				
				<div class="div_table">
					<table width="100%" border="1">
						<tr id="ROW1">
							<td>Tên admin</td>
							<td>Ngày sinh</td>
							<td>Giới tính</td>
							<td>Cmnd</td>
							<td>Số điện thoại</td>
							<td>Email</td>
							<td>Cấp độ</td>
							<td>Sửa thông tin</td>
							<td>Xoá admin</td>
							<?php foreach ($result as $each): ?>	
								<tr>
									<td>
										<?php echo $each['ten']?>
									</td>
									<td width="100px">
										<?php echo date_format(date_create($each['ngay_sinh']),'d-m-Y')  ?>
									</td>
									<td>
										<?php 
										if($each['gioi_tinh'] == 1) echo "Nam"; else echo "Nữ";
										?>
									</td>
									<td>
										<?php echo $each['cmnd']?>
									</td>
									<td>
										<?php echo $each['sdt']?>
									</td>
									<td>
										<?php echo $each['email']?>	
									</td>
									<td>
										<?php 
										if($each['cap_do'] == 1) { echo "Super Admin";} 
										else { echo "Admin"; }
										?>
									</td>             
									<td>
										<a href="update_admin.php?action=2&ma=<?php echo $each['ma'] ?>"><center><img src="../../image/edit.png" width="30" height="30" /></center></a>
									</td>
									<td>
										<?php 
										if($each['cap_do'] == 0) { ?>
											<a href="process.php?action=0&ma=<?php echo $each['ma']?>&cap_do=<?php echo $each['cap_do'] ?> " onclick="return confirm('Bạn chắc chắn muốn xoá admin này chứ?')"><center><i class="fa fa-trash-o" style="font-size:30px; color: red"></i></center></a>
										<?php } ?>

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
		</div>
		<?php mysqli_close($connect) ?>
		<?php include('../common/footer_admin.php') ?>
	</div>
	<script type="text/javascript" src="../../include/JS/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../../include/JS/menu.js"></script>
</body>
</html>



