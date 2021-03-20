<?php 
include('../common/connect.php');
$action = $_REQUEST['action'] ?? '';
$ma = $_REQUEST['ma'] ?? '';
if($action == 1 || $action == 2 || $action == 0) {  //1 = thêm ,2 = sửa
	if($action == 0) {
		$sql_ma = "select ma_loai_thu_cung from thu_cung where ma_loai_thu_cung = $ma";
		$result_ma = mysqli_query($connect, $sql_ma);
		$count = mysqli_num_rows($result_ma);
		if($count > 0) {
			echo "<script> window.location.replace('../quan_ly_loai_thu_cung/'); alert('Loại thú cưng này không thể xoá !');</script>";
		} else {
			$sql = "delete from loai_thu_cung where ma = '$ma'";
			mysqli_query($connect,$sql);
			echo "<script> window.location.replace('../quan_ly_loai_thu_cung/'); alert('Đã xoá !');</script>";
		}
		exit();
	}
	if(!empty($_POST['loai_thu_cung']) || !empty($_POST['loai_thu_cung_moi'])) {
		if($action == 1) {
			$loai_thu_cung = $_POST['loai_thu_cung']; // sử dụng cho thêm
			$sql_check = "select ten from loai_thu_cung where ten = '$loai_thu_cung'"; // kiểm tra xem loại thú cưng vừa THÊM có trong ĐB chưa 
			$result = mysqli_query($connect, $sql_check);
			$dem_ket_qua = mysqli_num_rows($result);
			if($dem_ket_qua == 0) { // chưa có loại thú cưng lông này trong ĐB
				$sql_them = "insert into loai_thu_cung(ten)values('$loai_thu_cung')";
				mysqli_query($connect, $sql_them);
				echo "<script> window.location.replace('../quan_ly_loai_thu_cung/?action=3&ma=mac_dinh');
				alert('Đã thêm !');</script>";
			} else header("location:index.php?action=1&ma=mac_dinh&error=*loại thú cưng này đã tồn tại. Vui lòng nhập loại thú cưng khác!"); 
			exit();
		} else { // action = 2 : sửa 
			$ma = $_REQUEST['ma']; //lấy mã loại thú cưng lông  
			$loai_thu_cung_moi = $_POST['loai_thu_cung_moi']; // sử dụng cho sửa 
			$sql_check = "select ten from loai_thu_cung where ten = '$loai_thu_cung_moi'"; // kiểm tra xem có loại thú cưng vừa SỬA có trong ĐB chưa 
			$result = mysqli_query($connect, $sql_check);
			$dem_ket_qua = mysqli_num_rows($result);
			if($dem_ket_qua == 0) { // loại thú cưng sửa này chưa có trong ĐB
				$sql_sua = "update loai_thu_cung set ten = '$loai_thu_cung_moi' where ma = '$ma'";
				mysqli_query($connect, $sql_sua);
				echo "<script> window.location.replace('../quan_ly_loai_thu_cung/?action=3&ma=mac_dinh');
				alert('Đã sửa !');</script>";
			} else header("location:index.php?action=2&ma=$ma&error=*loại thú cưng này đã tồn tại. Vui lòng nhập loại thú cưng khác!");
			exit();
		}
	} else header("location:../common/loi.php");
	exit();
} else {
	echo "<script> window.location.replace('../quan_ly_loai_thu_cung/');
	alert('Thao tác không hợp lệ !');</script>";
}
mysqli_close($connect);