<?php include('../check_admin.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../CSS/admin.css">
	<link rel="stylesheet" href="../../CSS/user.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		.all_table h3 {
			padding-top: 30px;
			padding-bottom: 30px;
			text-align: center;
		}
		.all_table table {
			width: 100%; 
			margin: auto;
		}
		.div_tong_tien {
			width: 30%; 
			height: 20%; 
			float: none; 
			margin-left:65%; 
			text-align: right;
		}
		.div_tong_tien button {
			width: 40%;
			padding-top: 10px;
			font-size: 17px;
			margin-top: 20px;
			cursor: pointer;
			border-radius: 5px;
		}
		.div_tong_tien p {
			margin-right: 30px;
			font-size: 18px;
			margin-top: 20px;
		}
		.div_tong_tien a {
			color: black;
			text-decoration: none;
		}
		.chu_mau_do {
			color : white;
		}
	</style>
</head>
<body>
	<?php if(empty($_GET['ma']) || empty($_GET['ma_khach_hang'])) header("location:../quan_ly_hoa_don/")?>
	<?php 
	include('../common/connect.php');
$ma = $_GET['ma']; // mã hóa đơn
$ma_khach_hang = $_GET['ma_khach_hang'];
// kiểm tra nếu người dùng nhập mã hoá đơn khác
$sql_check_ma = "select ma from hoa_don where ma = $ma";
$result_check_ma = mysqli_query($connect, $sql_check_ma);
$dem_ket_qua_check_ma = mysqli_num_rows($result_check_ma);
if($dem_ket_qua_check_ma == 0) echo "<script> window.location.replace('index.php'); alert('Không có mã hoá đơn này !');</script>";
// kiểm tra nếu người dùng nhập mã khách hàng
$sql_check_ma_hoa_don = "select * from hoa_don where ma_khach_hang = $ma_khach_hang";
$result_check_ma_hoa_don = mysqli_query($connect, $sql_check_ma_hoa_don);
$dem_ket_qua_check_ma_hoa_don = mysqli_num_rows($result_check_ma_hoa_don);
if($dem_ket_qua_check_ma_hoa_don == 0) echo "<script> window.location.replace('index.php'); alert('Không có mã khách hàng này !');</script>";
$sql_khach_hang = "select 
khach_hang.ten, hoa_don.tinh_trang, hoa_don.ma
from hoa_don join  khach_hang on hoa_don.ma_khach_hang = khach_hang.ma
where khach_hang.ma = $ma_khach_hang and hoa_don.ma = $ma";
$result_khach_hang = mysqli_query($connect, $sql_khach_hang);
$each_khach_hang = mysqli_fetch_array($result_khach_hang);
$sql = "select 
hoa_don_chi_tiet.*,
thu_cung.ten,
thu_cung.anh
from hoa_don_chi_tiet
join thu_cung on thu_cung.ma = hoa_don_chi_tiet.ma_thu_cung
where ma_hoa_don = '$ma'";
$result = mysqli_query($connect, $sql);
$thu_muc_anh = '../../image/';
$tong_tien_tat_ca = 0;
?>
<?php include('../common/header_admin.php') ?>
<?php include('../common/menu_admin.php') ?>
<div class="div_tong" >
	<div class="div_content" style="height: auto; margin-top:-3px;">
		<div class="all_table kh">
			<button class="quay_lai" onclick="window.history.back();">
				<i class="fa fa-reply"></i>Quay lại
			</button> 
			<h3>Hóa đơn của khách hàng : <?php echo $each_khach_hang['ten'] ?></h3>
			<div class="div_table">
				<table border="1">
					<tr id="ROW1">
						<td>Tên thú cưng</td>
						<td>Ảnh</td>
						<td>Giá</td>
					</tr>
					<?php foreach ($result as $each) {  ?>	
						<tr>
							<td><?php echo $each['ten'] ?></td>
							<td><img height="130px" src="<?php echo $thu_muc_anh . $each['anh'] ?>"></td>
							<td><?php echo number_format($each['gia']); ?> đ</td>
							<?php $tong_tien_tat_ca += $each['gia'] ?>
						</tr>	
					<?php } ?>
				</table>

				<div class="div_tong_tien">
					<h3 style="margin-top: 30px">Tổng tiền tất cả : <span class="chu_mau_do"><?php echo number_format($tong_tien_tat_ca) ?> VNĐ</span></h3>
					<?php if($each_khach_hang['tinh_trang'] == 1) {?>
						<button style="background:lightgreen;"><a href="update_tinh_trang.php?ma=<?php echo $each_khach_hang['ma'] ?>&tinh_trang=2">Duyệt hóa đơn</a></button>
						<button style="background:red;"><a href="update_tinh_trang.php?ma=<?php echo $each_khach_hang['ma'] ?> &tinh_trang=3" onclick="return confirm('Bạn chắc chắn muốn hủy đơn hàng này chứ?')">Hủy hóa đơn</a></button>
					<?php } else {?>
						<p>
							( Hóa đơn này 
							<span class="chu_mau_do">
								<?php if($each_khach_hang['tinh_trang'] == 2) echo "đã được duyệt"; else echo "đã bị hủy"; ?>
							</span> )
						</p> 
					<?php } ?>
				</div>
			</div>
		</div>
		<?php mysqli_close($connect) ?>
	</div>
	<?php include('../common/footer_admin.php') ?>
</div>
<script type="text/javascript" src="../../include/JS/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../../include/JS/menu.js"></script>
</body>
</html>