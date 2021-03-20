<?php include('../check_admin.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản lý hóa đơn</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../CSS/admin.css">
	<link rel="stylesheet" href="../../CSS/user.css">
</head>
<body>
	<?php
	include('../common/header_admin.php');
	include('../common/menu_admin.php');
	require '../common/connect.php';
	$tim_kiem ='';
	if(isset($_GET['tim_kiem'])) $tim_kiem = trim($_GET['tim_kiem']);
	$sql = "select hoa_don.*, khach_hang.ma as ma_khach_hang, khach_hang.ten, khach_hang.dia_chi, khach_hang.sdt
	from hoa_don join khach_hang on khach_hang.ma = hoa_don.ma_khach_hang
	where hoa_don.ten_nguoi_nhan like '%$tim_kiem%' ORDER BY hoa_don.tinh_trang, hoa_don.ma DESC";
	$result = mysqli_query($connect,$sql);
	$tong_so_hoa_don = mysqli_num_rows($result);
	$so_hoa_don_1_trang = 10;
	$tong_so_trang = ceil($tong_so_hoa_don / $so_hoa_don_1_trang);
	$trang_hien_tai = 1;
	if(isset($_GET['trang'])) $trang_hien_tai = $_GET['trang'];
	$so_hoa_don_can_bo_qua = ($trang_hien_tai - 1) * $so_hoa_don_1_trang;
	$sql = "$sql
	limit $so_hoa_don_1_trang offset $so_hoa_don_can_bo_qua";
	$result = mysqli_query($connect,$sql);
	?>
	
	<div class="div_tong" >
		<div class="div_content">
			<div class="all_table kh">
				<button class="quay_lai" onclick="window.history.back();">
					<i class="fa fa-reply"></i>Quay lại
				</button> <br>
				<div class="div_1">
					<div class="tong_san_pham">
						<h3>Có tất cả <?php echo $tong_so_hoa_don ?> hóa đơn</h3>
						<p><?php if(isset($_GET['tim_kiem'])) echo "Từ khoá tìm kiếm :". $tim_kiem;?></p>
					</div>
					<div class="tim_kiem">
						<form>
							<input type="search" placeholder="Tên người nhận..." name="tim_kiem" value="<?php echo $tim_kiem ?>">
							<button type="submit"><i class="fa fa-search"></i></button>
						</form>
					</div>
				</div>
				<div class="div_table">
					<table width="100%" border="1">
						<tr id="ROW1">
							<td>Thời gian đặt hàng</td>
							<td>Tình trạng</td>
							<td>Thông tin người nhận</td>
							<td>Thông tin người đặt</td>
							<td>Sửa tình trạng</td>
							<td>Xem</td>
						</tr>
						<?php foreach ($result as $each): ?>	
							<tr>
								<td>
									<?php echo date_format(date_create($each['thoi_gian_mua']),'d-m-Y H:i:s')  ?>
								</td>
								<td>
									<?php 
									if($each['tinh_trang'] == 1) echo "Đang chờ duyệt";
									else if($each['tinh_trang'] == 2) echo "Đã duyệt";
									else echo "Đã hủy";
									?>
								</td>
								<td>
									<?php echo $each['ten_nguoi_nhan'] ?> 
									<br>
									<?php echo $each['sdt_nguoi_nhan'] ?> 
									<br>
									<?php echo $each['dia_chi_nguoi_nhan'] ?> 
								</td>                         	
								<td>
									<?php echo $each['ten'] ?>
									<br> 
									<?php echo $each['sdt'] ?>
									<br> 
									<?php echo $each['dia_chi'] ?>
								</td>                        	
								<td width="180px">
									<?php if($each['tinh_trang'] == 1) {?>
										<div class="div_hover" style="margin-left: 20px; margin-right:60px;">
											<a href="update_tinh_trang.php?ma=<?php echo $each['ma'] ?> &tinh_trang=2"><i class='fas fa-check-circle' style="color:green"></i></a>
											<span class="span_duyet_huy">Duyệt hóa đơn</span>
										</div>
										<div class="div_hover">
											<a href="update_tinh_trang.php?ma=<?php echo $each['ma'] ?> &tinh_trang=3" onclick="return confirm('Bạn chắc chắn muốn hủy đơn hàng này chứ?')"> <i class="fa fa-times-circle" style="font-size:40px;color:red"></i></a>
											<span class="span_duyet_huy">Hủy hóa đơn</span>
										</div>
									<?php } ?>
								</td>
								<td>
									<div class="div_hover">
										<a href="xem_chi_tiet.php?ma=<?php echo $each['ma'] ?>&ma_khach_hang=<?php echo $each['ma_khach_hang'] ?>"><i class="fas fa-eye" style="font-size:30px; color: black"></i></a>
										<span class="span_duyet_huy">Xem chi tiết</span>
									</div>
								</td>
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