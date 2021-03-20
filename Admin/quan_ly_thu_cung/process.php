<?php 
include('../common/connect.php');
$action = $_REQUEST['action']; //1 = thêm ; 2 = sửa ;0 = xóa
$ma = $_REQUEST['ma'] ?? ''; //sử dụng nếu không biết phương thức gửi lên là _POST hay _GET
if($action==1 || $action==2 || $action==0 ) {
	if($action==0) {
		$sql_ma = "select ma_thu_cung from hoa_don_chi_tiet where ma_thu_cung = $ma";
		$result_ma = mysqli_query($connect, $sql_ma);
		$count = mysqli_num_rows($result_ma);
		if($count > 0) {
			echo "<script> window.location.replace('../quan_ly_thu_cung/'); alert('Thú cưng này không thể xoá !');</script>";
			exit();
		} else {
			$sql = "delete from thu_cung where ma = '$ma'";
			mysqli_query($connect,$sql);
			echo "<script> window.location.replace('../quan_ly_thu_cung/'); alert('Đã xoá !');</script>";
			exit();
		}
	} else {
		if(!empty($_POST['ten']) && !empty($_POST['gia_ban']) && !empty($_POST['dac_diem']) && !empty($_POST['cach_cham_soc']) && !empty($_POST['can_nang_nho_nhat']) && !empty($_POST['can_nang_lon_nhat']) && !empty($_FILES['anh']) 
			||(!empty($_POST['ten']) && !empty($_POST['gia_ban']) && !empty($_POST['dac_diem']) && !empty($_POST['cach_cham_soc']) && !empty($_POST['can_nang_nho_nhat'])&& !empty($_POST['can_nang_lon_nhat']) && !empty($_FILES['anh_moi']))) {
			$ten =trim($_POST['ten']);
		$gia_ban = abs($_POST['gia_ban']);//đổi số âm thành dương
		$dac_diem =trim($_POST['dac_diem']);
		$cach_cham_soc =trim($_POST['cach_cham_soc']);
		$gioi_tinh = $_POST['gioi_tinh'];
		$can_nang_nho_nhat =trim($_POST['can_nang_nho_nhat']);
		$can_nang_lon_nhat =trim($_POST['can_nang_lon_nhat']);
		$ma_xuat_xu = $_POST['ma_xuat_xu'];
		$ma_mau_long = $_POST['ma_mau_long'];
		$ma_loai_thu_cung = $_POST['ma_loai_thu_cung'];
		$thu_muc_anh = '../../image/';

		if($action==1){ //thêm
			$anh = $_FILES['anh'];
			$duoi_anh = explode('.', $anh['name'])[1];
			$ten_anh = time() . '.' . $duoi_anh;
			$duong_dan_anh = $thu_muc_anh . $ten_anh;
			move_uploaded_file($anh['tmp_name'], $duong_dan_anh);
			
			// kiểm tra tên có trong ĐB chưa
			$sql_check_ten = "select ten from thu_cung where ten = '$ten'";
			$result_check_ten = mysqli_query($connect, $sql_check_ten);
			$dem_ket_qua = mysqli_num_rows($result_check_ten);
				if($dem_ket_qua == 0) { // chưa có ten này trong database
					$sql = "insert into thu_cung
					(ten,anh,gia_ban,dac_diem,cach_cham_soc,gioi_tinh,can_nang_nho_nhat,can_nang_lon_nhat,ma_xuat_xu,ma_mau_long,ma_loai_thu_cung) values
					('$ten','$ten_anh','$gia_ban','$dac_diem','$cach_cham_soc','$gioi_tinh','$can_nang_nho_nhat','$can_nang_lon_nhat','$ma_xuat_xu','$ma_mau_long','$ma_loai_thu_cung')";

					mysqli_query($connect,$sql);
					header('location:../quan_ly_thu_cung/');
				} else {
					header("location:insert_thu_cung.php?action=1&error=*Tên này đã tồn tại. Vui lòng nhập tên khác!");
				}
			}
		if($action==2){ //sửa
			$anh = $_FILES['anh_moi'];
			if($anh['size'] == 0) {
				$ten_anh = $_POST['anh_cu'];
			} else {
				$duoi_anh = explode('.', $anh['name'])[1];
				$ten_anh = time() . '.' . $duoi_anh;
				$duong_dan_anh = $thu_muc_anh . $ten_anh;
				move_uploaded_file($anh['tmp_name'], $duong_dan_anh);
			}
			$sql_check_ten = "select ten from thu_cung where ten = '$ten' and ma != $ma";
			$result_check_ten = mysqli_query($connect, $sql_check_ten);
			$dem_ket_qua = mysqli_num_rows($result_check_ten);
			if($dem_ket_qua == 0) {
				$sql = "update thu_cung 
				set ten = '$ten',anh = '$ten_anh',gia_ban = '$gia_ban',dac_diem = '$dac_diem',cach_cham_soc = '$cach_cham_soc',
				gioi_tinh = '$gioi_tinh',can_nang_nho_nhat = '$can_nang_nho_nhat',can_nang_lon_nhat = '$can_nang_lon_nhat',ma_xuat_xu = '$ma_xuat_xu',ma_mau_long = '$ma_mau_long',
				ma_loai_thu_cung = '$ma_loai_thu_cung' where ma = '$ma'";

				mysqli_query($connect,$sql);
				header('location:../quan_ly_thu_cung/');
				exit();
			} else {
				header("location:update_thu_cung.php?action=2&ma=$ma&error=*Tên này đã tồn tại. Vui lòng sửa bằng tên khác!");
			}
			
		}
	} else header("location:../common/loi.php");
}
} else echo "<script> window.location.replace('index.php'); alert('Thao tác không hợp lệ !')</script>";
mysqli_close($connect);