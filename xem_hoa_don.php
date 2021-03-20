<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>Xem hóa đơn</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="CSS/admin.css">
	<link rel="stylesheet" href="CSS/user.css">
	<style type="text/css" media="screen">
		.hoa_don_trong {
			height: auto;
			width: 90%;
			text-align: center;
			padding-top: 10%;
			padding-bottom: 10%;
		}
		.hoa_don_trong button{
			padding: 10px;
			background: #F0F0ED;
			border-radius: 3px;
			margin-top: 30px;
			font-size: 23px;
		}
		.hoa_don_trong button a{
			text-decoration: none; color: black;
		}
		.hoa_don_trong button:hover{
			background: #F9B234;
		}
	</style>
</head>
<body>
	<?php 
	include('include/head.php');
	include('include/menu.php');
	$ma_khach_hang = $_SESSION['ma'];
	require 'Admin/common/connect.php';
	if(isset($_GET['ma_loai_thu_cung'])) {
		$ma_loai_thu_cung = $_GET['ma_loai_thu_cung'];
		echo "<script> window.location.replace('../doAn1/?ma_loai_thu_cung=$ma_loai_thu_cung');</script>";
	}
	$tim_kiem ='';
	if(isset($_GET['tim_kiem'])) $tim_kiem = addslashes(trim($_GET['tim_kiem']));
	$sql = "select *
	from hoa_don
	where hoa_don.ma_khach_hang = '$ma_khach_hang' and hoa_don.ten_nguoi_nhan like '%$tim_kiem%' ORDER BY hoa_don.tinh_trang, hoa_don.ma DESC";
	$result = mysqli_query($connect,$sql);
	$tong_so_hoa_don = mysqli_num_rows($result);
	$so_hoa_don_1_trang = 8;
	$tong_so_trang = ceil($tong_so_hoa_don / $so_hoa_don_1_trang);
	$trang_hien_tai = 1;
	if(isset($_GET['trang'])) $trang_hien_tai = $_GET['trang'];
	$so_hoa_don_can_bo_qua = ($trang_hien_tai - 1) * $so_hoa_don_1_trang;
	$sql = "$sql
	limit $so_hoa_don_1_trang offset $so_hoa_don_can_bo_qua";
	$result = mysqli_query($connect,$sql);
	?>
	<div class="div_tong">
		<div class="kh" style="width: 90%; height: auto;margin: auto; float: none;">
			<?php if($tong_so_hoa_don == 0 && isset($_GET['tim_kiem']) ) { include('dang_cap_nhat.php');?>
		<?php } elseif($tong_so_hoa_don == 0) {  ?>
			<div class="hoa_don_trong">
				<h2>Bạn chưa có đơn hàng nào</h2>
				<button><a href="index.php">Tiếp tục mua sắm</a></button>
			</div>
		<?php } else { ?>
			<div class="all_table" style="margin: auto; width: 100%;">
				<div class="div_1">
					<div class="tong_san_pham"><h3>Bạn có tất cả <?php echo $tong_so_hoa_don ?> đơn hàng</h3></div>
					<div class="tim_kiem">
						<form>
							<input type="search" placeholder="Tên người nhận..." name="tim_kiem" value="<?php echo $tim_kiem ?>">
							<button type="submit"><i class="fa fa-search"></i></button>
						</form>
					</div>
				</div>
				<div class="div_table">
					<table width="100%" >
						<tr id="ROW1">
							<td>Thời gian đặt hàng</td>
							<td>Tình trạng</td>
							<td>Thông tin người nhận</td>
							<td>Xem chi tiết</td>
						</tr>
						<?php foreach ($result as $each) { ?>
							<tr>
								<td><?php echo date_format(date_create($each['thoi_gian_mua']),'d-m-Y H:i:s')?></td>
								<td>
									<?php
									if($each['tinh_trang'] == 1) echo "Đang chờ duyệt";
									else if($each['tinh_trang'] == 2) echo "Đã duyệt";
									else echo "Đã hủy";
									?>
								</td>
								<td>
									Tên : <?php echo $each['ten_nguoi_nhan'] ?><br>
									Số điện thoại : <?php echo $each['sdt_nguoi_nhan']?><br>
									Địa chỉ : <?php echo $each['dia_chi_nguoi_nhan'] ?>
								</td>
								<td>
									<div class="div_hover">
										<a href="xem_chi_tiet_hoa_don.php?ma_hoa_don=<?php echo $each['ma']?>"><i class="fas fa-eye" style="font-size:30px; color: black; margin-left: 50px;"></i></a>
										<span class="span_duyet_huy">Xem chi tiết</span>
									</div>
								</td>
							</tr>
						<?php } ?>
					</table>
					<?php if($trang_hien_tai > ($tong_so_trang + 1)) echo "<script> alert('Trang này không tồn tại !'); window.history.back(-1); </script>";?>
					<div class="div_so_trang">
						
						<?php for($i = 1; $i <= $tong_so_trang; $i++) { ?>
							<a <?php if($trang_hien_tai == $i) { ?> class="active" <?php } ?> href="?trang=<?php echo $i ?>">
								<?php echo $i ?>
							</a>
						<?php } ?>
						
					</div>
				</div>
			</div>
			<button></button><br><button></button>
		</div>
		<?php mysqli_close($connect) ?>
	<?php } ?>
</div>
<?php include('include/footer.php') ?>
<script type="text/javascript" src="include/JS/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="include/JS/menu.js"></script>
</body>
</html>