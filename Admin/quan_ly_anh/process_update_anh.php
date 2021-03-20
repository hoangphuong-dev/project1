<?php
include('../common/connect.php');
$ma = $_POST['ma'];
$anh = $_FILES['anh_moi'];
$thu_muc_anh = '../../image/';
if($anh['size'] == 0) $ten_anh = $_POST['anh_cu'];
else {
	$duoi_anh = explode('.', $anh['name'])[1];
	$ten_anh = time() . '.' . $duoi_anh;
	$duong_dan_anh = $thu_muc_anh . $ten_anh;
	move_uploaded_file($anh['tmp_name'], $duong_dan_anh);
}
$sql = "update anh set 
ten_ma_hoa = '$ten_anh'
where ma = '$ma'";
mysqli_query($connect,$sql);
header('location:../quan_ly_anh/');
mysqli_close($connect);


