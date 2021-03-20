<?php
$ma = $_POST['ma'];
include('../Admin/common/connect.php');
if(!empty($_POST['ten']) && !empty($_POST['sdt']) && !empty($_POST['email']) && !empty($_POST['mat_khau']) && !empty($_POST['dia_chi'])) {
	$nam = $_POST['nam']; // lấy năm sinh
	$thang = $_POST['thang']; // lấy tháng sinh
	$ngay = $_POST['ngay']; // lấy ngày sinh
	$ngay_sinh = $nam.'-'.$thang.'-'.$ngay;
	$ten =trim($_POST['ten']);
	$dia_chi =trim($_POST['dia_chi']);
	$sdt =trim($_POST['sdt']);
	$email =trim($_POST['email']);
	$mat_khau =trim($_POST['mat_khau']);
	$sql_checkmail = "select email from khach_hang where email = '$email' and ma != $ma";
	$result_checkmail = mysqli_query($connect, $sql_checkmail);
	$dem_ket_qua = mysqli_num_rows($result_checkmail);
	if($dem_ket_qua == 0) {
		$sql = "update khach_hang set ten = '$ten',ngay_sinh = '$ngay_sinh',sdt = '$sdt',email = '$email',mat_khau = '$mat_khau',dia_chi = '$dia_chi' where ma = '$ma'";
		mysqli_query($connect, $sql);
		session_start();
		unset($_SESSION['ten']);
		$_SESSION['ten'] = $ten;
		echo "<script> window.location.replace('../thong_tin_nguoi_dung.php'); alert('Thông tin của bạn đã được cập nhật !');</script>";
	} else {
		header("location:../thong_tin_nguoi_dung.php?error=*Email này đã tồn tại. Vui lòng sửa bằng email khác!");
	}
} else header("location:loi.php");
mysqli_close($connect);