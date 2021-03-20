<?php 
include('../common/connect.php');
$action = $_REQUEST['action'] ?? '';
$ma = $_REQUEST['ma'] ?? '';
if($action == 1 || $action == 2|| $action == 0) {  //1 = thêm ,2 = sửa
	if($action == 0) {
		$sql_ma = "select ma_xuat_xu from thu_cung where ma_xuat_xu = $ma";
		$result_ma = mysqli_query($connect, $sql_ma);
		$count = mysqli_num_rows($result_ma);
		if($count > 0) {
			echo "<script> window.location.replace('../quan_ly_nguon_goc/'); alert('Quốc gia này không thể xoá !');</script>";
		} else {
			$sql = "delete from xuat_xu where ma = '$ma'";
			mysqli_query($connect,$sql);
			echo "<script> window.location.replace('../quan_ly_nguon_goc/'); alert('Đã xoá !');</script>";
		}
		exit();
	}
	if(!empty($_POST['quoc_gia']) || !empty($_POST['quoc_gia_moi'])) {
		if($action == 1) {
			$quoc_gia = $_POST['quoc_gia']; // sử dụng cho thêm
			$sql_check = "select ten_quoc_gia from xuat_xu where ten_quoc_gia = '$quoc_gia'"; // kiểm tra xem quốc gia vừa THÊM có trong ĐB chưa
			$result = mysqli_query($connect, $sql_check);
			$dem_ket_qua = mysqli_num_rows($result);
			if($dem_ket_qua == 0) { // chưa có quốc gia lông này trong ĐB
				$sql_them = "insert into xuat_xu(ten_quoc_gia)values('$quoc_gia')";
				mysqli_query($connect, $sql_them);
				echo "<script>window.location.replace('../quan_ly_nguon_goc/');alert('Đã thêm !');</script>";
			} else header("location:index.php?action=1&ma=mac_dinh&error=*quốc gia này đã tồn tại. Vui lòng nhập quốc gia khác!");
			exit();
		} else { // action = 2 : sửa
			$ma = $_REQUEST['ma']; //lấy mã quốc gia lông 
			$quoc_gia_moi = $_POST['quoc_gia_moi']; // sử dụng cho sửa
			$sql_check = "select ten_quoc_gia from xuat_xu where ten_quoc_gia = '$quoc_gia_moi'"; // kiểm tra xem có quốc gia vừa SỬA có trong ĐB chưa
			$result = mysqli_query($connect, $sql_check);
			$dem_ket_qua = mysqli_num_rows($result);
			if($dem_ket_qua == 0) { // quốc gia sửa này chưa có trong ĐB
				$sql_sua = "update xuat_xu set ten_quoc_gia = '$quoc_gia_moi' where ma = '$ma'";
				mysqli_query($connect, $sql_sua);
				echo "<script>window.location.replace('../quan_ly_nguon_goc/');alert('Đã sửa !');</script>";
			} else header("location:index.php?action=2&ma=$ma&error=*quốc gia này đã tồn tại. Vui lòng nhập quốc gia khác!");
			exit();
		}
	} else header("location:../common/loi.php");
	exit();
} else echo "<script> window.location.replace('../quan_ly_nguon_goc/');alert('Thao tác không hợp lệ !');</script>";
mysqli_close($connect);