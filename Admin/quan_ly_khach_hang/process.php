<?php 
date_default_timezone_set('Asia/Ho_Chi_Minh');
include('../common/connect.php');
$action = $_REQUEST['action']; //1 = thêm ; 2 = sửa ;0 = xóa
$ma = $_REQUEST['ma'] ?? ''; //sử dụng nếu không biết phương thức gửi lên là _POST hay _GET
if(!empty($_POST['ten']) && !empty($_POST['sdt']) && !empty($_POST['email']) && !empty($_POST['mat_khau']) && !empty($_POST['dia_chi'])) {
	$ten =trim($_POST['ten']);
$nam = $_POST['nam']; // lấy năm sinh 
$thang = $_POST['thang']; // lấy tháng sinh
$ngay = $_POST['ngay']; // lấy ngày sinh
$ngay_sinh = $nam.'-'.$thang.'-'.$ngay;
$gioi_tinh = $_POST['gioi_tinh'];
$sdt =trim($_POST['sdt']);
$email =trim($_POST['email']);
$mat_khau =trim($_POST['mat_khau']);
$dia_chi = $_POST['dia_chi'];
$sql_checkmail = "select email from khach_hang where email = '$email' and ma != $ma";
$result_checkmail = mysqli_query($connect, $sql_checkmail);
$dem_ket_qua = mysqli_num_rows($result_checkmail);
if($dem_ket_qua == 0) {
	$sql = "update khach_hang set ten = '$ten', ngay_sinh = '$ngay_sinh', gioi_tinh = '$gioi_tinh', sdt = '$sdt',email = '$email',mat_khau = '$mat_khau',dia_chi = '$dia_chi' where ma = '$ma'";
	mysqli_query($connect,$sql);
	header('location:../quan_ly_khach_hang/');
} else header("location:update_khach_hang.php?ma=$ma&error=*Email này đã tồn tại. Vui lòng sửa bằng email khác!");
} else header("location:../common/loi.php");
mysqli_close($connect);