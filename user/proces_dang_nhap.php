<?php 
$email = $_POST['email'];
$mat_khau = $_POST['mat_khau'];
include('../Admin/common/connect.php');
$regex_email = '/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/';
if (preg_match($regex_email, $email) === 1){
	$sql = "select * from khach_hang
	where email = '$email' and mat_khau = '$mat_khau'";
	$result = mysqli_query($connect,$sql);
	$dem_ket_qua = mysqli_num_rows($result);
	if($dem_ket_qua == 1) {
		session_start();
		$each = mysqli_fetch_array($result);
		$_SESSION['ma'] = $each['ma'];
		$_SESSION['ten'] = $each['ten'];
		echo "<script>
		window.location.replace('../index.php');
		alert('Đăng nhập thành công !');
		</script>";
	} else header("location:../index.php?error=Email hoặc mật khẩu không hợp lệ !");
} else header("location:../index.php?error=Email hoặc mật khẩu không hợp lệ !");