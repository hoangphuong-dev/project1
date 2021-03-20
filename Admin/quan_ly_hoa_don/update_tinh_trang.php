<?php
$ma = $_GET['ma'];
$tinh_trang = $_GET['tinh_trang'];
require '../common/connect.php';
$sql = "select tinh_trang from hoa_don where ma = '$ma'";
$result = mysqli_query($connect, $sql);
$each = mysqli_fetch_array($result);
if($each['tinh_trang'] == 1) {
	$sql = "update hoa_don set tinh_trang = '$tinh_trang' where ma = '$ma'";
	mysqli_query($connect,$sql);
	mysqli_close($connect);
	header('location:../quan_ly_hoa_don/');
} else {
	echo "<script> alert('Thao tác không hợp lệ !'); window.history.back(-1); </script>";
}

