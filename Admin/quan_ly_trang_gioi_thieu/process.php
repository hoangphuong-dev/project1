<?php
include('../common/connect.php');
if(!empty($_POST['tieu_de']) && !empty($_POST['noi_dung']) && !empty($_POST['noi_dung_anh'])) {
	$anh = $_FILES['anh_moi'];
	$thu_muc_anh = '../../image/';
	if($anh['size'] == 0) $ten_anh = $_POST['anh_cu'];
	else {
		$duoi_anh = explode('.', $anh['name'])[1];
		$ten_anh = time() . '.' . $duoi_anh;
		$duong_dan_anh = $thu_muc_anh . $ten_anh;
		move_uploaded_file($anh['tmp_name'], $duong_dan_anh);
	}
	$tieu_de =trim($_POST['tieu_de']);
	$noi_dung =trim($_POST['noi_dung']);
	$noi_dung_anh =trim($_POST['noi_dung_anh']);
	$sql = "update gioi_thieu set 
	tieu_de = '$tieu_de',
	anh = '$ten_anh',
	noi_dung = '$noi_dung',
	noi_dung_anh = '$noi_dung_anh'";
	mysqli_query($connect,$sql);
	echo "<script> window.location.replace('../quan_ly_trang_gioi_thieu/'); alert('Đã cập nhật thông tin !');</script>";
	exit();
} else header("location:../common/loi.php");
mysqli_close($connect);


