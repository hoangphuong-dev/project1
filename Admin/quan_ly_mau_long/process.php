<?php
include('../common/connect.php');
$action = $_REQUEST['action'] ?? '';
$ma = $_REQUEST['ma'] ?? '';
if($action == 1 || $action == 2 || $action == 0) {  //1 = thêm ,2 = sửa
	if($action == 0) {
		$sql_ma = "select ma_mau_long from thu_cung where ma_mau_long = $ma";
		$result_ma = mysqli_query($connect, $sql_ma);
		$count = mysqli_num_rows($result_ma);
		if($count > 0) {
			echo "<script> window.location.replace('../quan_ly_mau_long/'); alert('Màu này không thể xoá !');</script>";
		} else {
			$sql = "delete from mau_long where ma = '$ma'";
			mysqli_query($connect,$sql);
			echo "<script> window.location.replace('../quan_ly_mau_long/'); alert('Đã xoá !');</script>";
		}
		exit();
	}
	if(!empty($_POST['mau_long']) || !empty($_POST['mau_long_moi'])) {
		if($action == 1) {
			$mau_long = $_POST['mau_long']; // sử dụng cho thêm
			$sql_check = "select ten from mau_long where ten = '$mau_long'";
			$result = mysqli_query($connect, $sql_check);
			$dem_ket_qua = mysqli_num_rows($result);
			if($dem_ket_qua == 0) { // chưa có màu lông này trong ĐB
				$sql_them = "insert into mau_long(ten)values('$mau_long')";
				mysqli_query($connect, $sql_them);
				echo "<script>window.location.replace('../quan_ly_mau_long/');alert('Đã thêm !');</script>";
			} else header("location:index.php?action=1&ma=mac_dinh&error=*Màu này đã tồn tại. Vui lòng nhập màu khác!");
			exit();
		} else { // action = 2 : sửa
			$ma = $_REQUEST['ma']; //lấy mã màu lông
			$mau_long_moi = $_POST['mau_long_moi']; // sử dụng cho sửa
			$sql_check = "select ten from mau_long where ten = '$mau_long_moi'"; // kiểm tra xem có màu vừa SỬA có trong ĐB chưa
			$result = mysqli_query($connect, $sql_check);
			$dem_ket_qua = mysqli_num_rows($result);
			if($dem_ket_qua == 0) { // màu sửa này chưa có trong ĐB
				$sql_sua = "update mau_long set ten = '$mau_long_moi' where ma = '$ma'";
				mysqli_query($connect, $sql_sua);
				echo "<script>window.location.replace('../quan_ly_mau_long/');
				alert('Đã sửa !');</script>";
			}else header("location:index.php?action=2&ma=$ma&error=*Màu này đã tồn tại. Vui lòng nhập màu khác!");
			exit();
		}
	} else header("location:../common/loi.php");
	exit();
} else echo "<script> window.location.replace('../quan_ly_mau_long/'); alert('Thao tác không hợp lệ !');</script>";
mysqli_close($connect);