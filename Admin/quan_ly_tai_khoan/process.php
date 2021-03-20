<?php 
$ma = $_POST['ma'];
include('../common/connect.php');
if(!empty($_POST['ten']) && !empty($_POST['cmnd']) && !empty($_POST['sdt']) && !empty($_POST['email']) && !empty($_POST['mat_khau'])) {
	$ten =trim($_POST['ten']);
	$cmnd =trim($_POST['cmnd']);
	$sdt =trim($_POST['sdt']);
	$email =trim($_POST['email']);
	$mat_khau =trim($_POST['mat_khau']);

	$sql_checkmail = "select email from admin where email = '$email' and ma != $ma";
	$result_checkmail = mysqli_query($connect, $sql_checkmail);
	$dem_ket_qua = mysqli_num_rows($result_checkmail);
	if($dem_ket_qua == 0) {
		$sql = "update admin set ten = '$ten',cmnd = '$cmnd',sdt = '$sdt',email = '$email',mat_khau = '$mat_khau' where ma = '$ma'";
		mysqli_query($connect, $sql);
		session_start();
		unset($_SESSION['ten_admin']);
		$_SESSION['ten_admin'] = $ten;
		echo "<script> window.location.replace('index.php'); alert('Thông tin của bạn đã được cập nhật !'); </script>";
	} else {
		header("location:index.php?error=*Email này đã tồn tại. Vui lòng sửa bằng email khác!");
	}

} else header("location:../common/loi.php");
mysqli_close($connect);