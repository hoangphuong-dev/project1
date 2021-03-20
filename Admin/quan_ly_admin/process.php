<?php
include('../common/connect.php');
$action = $_REQUEST['action']; //1 = thêm ; 2 = sửa ;0 = xóa
$ma = $_REQUEST['ma'] ?? ''; //sử dụng nếu không biết phương thức gửi lên là _POST hay _GET
$cap_do = $_REQUEST['cap_do'] ?? '';
if($action==1 || $action==2 || $action==0 ) {
	if($action==0) {
		if($cap_do == 1) echo "<script> window.location.replace('../quan_ly_admin/'); alert('Bạn không thể xoá người này !'); </script>";
		$sql = "delete from admin where ma = '$ma' and cap_do = 0";
		mysqli_query($connect,$sql);
		echo "<script> window.location.replace('../quan_ly_admin/'); alert('Đã xoá !'); </script>";
	} else {
		if(!empty($_POST['ten']) && !empty($_POST['cmnd']) && !empty($_POST['sdt']) && !empty($_POST['email']) && !empty($_POST['mat_khau'])) {
			$ten =trim($_POST['ten']);
		$nam = $_POST['nam']; // lấy năm sinh 
		$thang = $_POST['thang']; // lấy tháng sinh
		$ngay = $_POST['ngay']; // lấy ngày sinh
		$ngay_sinh = $nam.'-'.$thang.'-'.$ngay;
		$gioi_tinh = $_POST['gioi_tinh'];
		$cmnd =trim($_POST['cmnd']);
		$sdt =trim($_POST['sdt']);
		$email =trim($_POST['email']);
		$mat_khau =trim($_POST['mat_khau']);
		$cap_do = 0; // 0 = admin ; 1 = supperAdmin
		// kiểm tra xem có email vừa nhập trong ĐB chưa
		$sql_checkmail = "select email from admin where email = '$email'";
		$result_checkmail = mysqli_query($connect, $sql_checkmail);
		$dem_ket_qua = mysqli_num_rows($result_checkmail);
		if($action==1){ //thêm
			if($dem_ket_qua == 0) { // chưa có email này trong database
				$sql = "insert into admin(ten,ngay_sinh,gioi_tinh,cmnd,sdt,email,mat_khau,cap_do)
				values('$ten','$ngay_sinh','$gioi_tinh','$cmnd','$sdt','$email','$mat_khau','$cap_do')";
				mysqli_query($connect,$sql);
				header('location:../quan_ly_admin/');
			} else header("location:insert_admin.php?action=1&error=*Email này đã tồn tại. Vui lòng đăng kí email khác!");
		}
		if($action==2){ //sửa
			$sql_checkmail = "select email from admin where email = '$email' and ma != $ma";
			$result_checkmail = mysqli_query($connect, $sql_checkmail);
			$dem_ket_qua = mysqli_num_rows($result_checkmail);
			if($dem_ket_qua == 0) {
				$sql = "update admin set ten = '$ten',ngay_sinh = '$ngay_sinh',gioi_tinh = '$gioi_tinh',cmnd = '$cmnd',
				sdt = '$sdt',email = '$email',mat_khau = '$mat_khau' where ma = '$ma'";
				mysqli_query($connect,$sql);
				header('location:../quan_ly_admin/');
			} else header("location:update_admin.php?action=2&ma=$ma&error=*Email này đã tồn tại. Vui lòng sửa bằng email khác!");
		}

	} else header("location:../common/loi.php");
}
} else echo "<script> window.location.replace('index.php'); alert('Thao tác không hợp lệ !'); </script>";
mysqli_close($connect);

