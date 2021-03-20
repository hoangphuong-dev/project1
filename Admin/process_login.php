<?php 
$email = $_POST['email'];
$mat_khau = $_POST['mat_khau'];
include('common/connect.php');
$regex_email = '/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/';
if (preg_match($regex_email, $email) === 1){
	$sql = "select *  from admin
	where email = '$email' and mat_khau = '$mat_khau'";
	$result = mysqli_query($connect, $sql);
	$so_ket_qua = mysqli_num_rows($result);
	if($so_ket_qua == 1) {
		session_start();
		$each = mysqli_fetch_array($result);
		$_SESSION['ma_admin'] = $each['ma'];
		$_SESSION['ten_admin'] = $each['ten'];
		$_SESSION['cap_do'] = $each['cap_do'];
		$_SESSION['admin'] = 1;
		header("location:common/trang_chu_admin.php");
	} else header("location:index.php?error=Email đăng nhập hoặc mật khẩu sai !");
} else header("location:index.php?error=Email đăng nhập hoặc mật khẩu sai !");