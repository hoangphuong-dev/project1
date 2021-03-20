<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="CSS/admin.css">
	<link rel="stylesheet" href="CSS/user.css">
	<style type="text/css" media="screen">
		.div_content {
			width: 90%; height: auto; margin: auto; float: none;
		}
		.all_table {
			width: 100%;margin-top:2px; z-index: -20;padding-top: 5%;
		}
		.all_table table {
			width: 90%; margin: auto;
		}
	</style>
</head>
<body>
	<?php
	include('include/head.php');
	include('include/menu.php');
	if(isset($_GET['ma_loai_thu_cung'])) {
		$ma_loai_thu_cung = $_GET['ma_loai_thu_cung'];
		echo "<script> window.location.replace('../doAn1/?ma_loai_thu_cung=$ma_loai_thu_cung');</script>";
	}
	if(empty($_GET['ma_hoa_don']))  {
		echo "<script>window.location.replace('xem_hoa_don.php');</script>";
		exit();
	}
	$ma_khach_hang = $_SESSION['ma'] ?? '';
	$ma_hoa_don = $_GET['ma_hoa_don'] ?? '';
	include('Admin/common/connect.php');
	$sql = "select 
	hoa_don_chi_tiet.gia,
	thu_cung.ten,
	thu_cung.anh
	from hoa_don_chi_tiet
	join thu_cung on thu_cung.ma = hoa_don_chi_tiet.ma_thu_cung
	join hoa_don on hoa_don.ma = hoa_don_chi_tiet.ma_hoa_don
	join khach_hang on khach_hang.ma = hoa_don.ma_khach_hang 
	where ma_hoa_don = '$ma_hoa_don' and khach_hang.ma = '$ma_khach_hang'";
	$result = mysqli_query($connect, $sql);
	$dem_ket_qua = mysqli_num_rows($result);
	if($dem_ket_qua == 0) echo "<script> alert('Bạn không được xem hoá đơn của người khác !'); window.history.back(-1); </script>";
	$each = mysqli_fetch_array($result);
	$thu_muc_anh = 'image/';
	$tong_tien_tat_ca = 0;
	?>
	<div class="div_tong" >
		<div class="div_content">
			<div class="all_table kh">
				<table border="1">
					<tr id="ROW1">
						<td>Tên thú cưng</td>
						<td>Ảnh</td>
						<td>Tổng tiền</td>
					</tr>
					<?php foreach ($result as $each) {  ?>
						<tr>
							<td><?php echo $each['ten'] ?></td>
							<td><img height="130px" src="<?php echo $thu_muc_anh . $each['anh'] ?>"></td>
							<td>
								<?php echo number_format($each['gia']) ?> VNĐ
								<?php $tong_tien_tat_ca += $each['gia'] ?>
							</td>
						</tr>
					<?php } ?>
				</table>
				<div class="div_tong_tien">
					<h3 style="margin:20px 20px 10px 70%;">Tổng tiền tất cả : <span style="color: white;"><?php echo number_format($tong_tien_tat_ca) ?> VNĐ</span></h3>
				</div>
			</div>
			<?php mysqli_close($connect) ?>
		</div>
		<?php include('include/footer.php') ?>
	</div>
	<script type="text/javascript" src="include/JS/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="include/JS/menu.js"></script>
</body>
</html>