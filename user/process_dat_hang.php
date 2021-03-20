<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
if(!empty($_POST['ten_nguoi_nhan']) && !empty($_POST['sdt_nguoi_nhan']) && !empty($_POST['so_nha']) && !empty($_POST['select_tinh']) && !empty($_POST['select_huyen'])) {
	$ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
	$sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
	$so_nha = $_POST['so_nha'];
	$select_tinh = $_POST['select_tinh'];
	$select_huyen = $_POST['select_huyen'];
	$dia_chi_nguoi_nhan = $so_nha.' - '.$select_huyen.' - '.$select_tinh;
	session_start();
	$ma_khach_hang = $_SESSION['ma'];
	$tinh_trang = 1; // đang chờ xử lý
	$thoi_gian_mua = date("Y-m-d H-i-s");
	include('../Admin/common/connect.php');
	$sql = "insert into hoa_don(ma_khach_hang,ten_nguoi_nhan,sdt_nguoi_nhan,dia_chi_nguoi_nhan,tinh_trang,thoi_gian_mua)
	values('$ma_khach_hang','$ten_nguoi_nhan','$sdt_nguoi_nhan','$dia_chi_nguoi_nhan','$tinh_trang','$thoi_gian_mua')";
	mysqli_query($connect,$sql);
	$sql = "select max(ma) from hoa_don";
	$result = mysqli_query($connect,$sql);
	$each = mysqli_fetch_array($result);
	$ma_hoa_don = $each['max(ma)'];
	foreach ($_SESSION['gio_hang'] as $ma_thu_cung => $so_luong) {
		$sql = "select gia_ban from thu_cung where ma = '$ma_thu_cung'";
		$result = mysqli_query($connect,$sql);
		$each = mysqli_fetch_array($result);
		$gia = $each['gia_ban'];
		$sql = "insert into hoa_don_chi_tiet(ma_hoa_don,ma_thu_cung,gia)
		values('$ma_hoa_don','$ma_thu_cung','$gia')";
		mysqli_query($connect,$sql);
	}
	unset($_SESSION['gio_hang']);
	echo "<script>
	window.location.replace('../xem_hoa_don.php');
	alert('Đặt hàng thành công !'); </script>";
} else header("location:loi.php");

