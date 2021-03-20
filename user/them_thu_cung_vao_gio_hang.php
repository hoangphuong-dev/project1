<?php
session_start();
$ma_san_pham = $_GET['ma'] ?? '';
include('../Admin/common/connect.php');
$sql_check_thu_cung = "select ma from thu_cung where ma = '$ma_san_pham'";
$result_check_thu_cung = mysqli_query($connect, $sql_check_thu_cung);
$dem_ket_qua = mysqli_num_rows($result_check_thu_cung);
if($dem_ket_qua == 1) { // có thú cưng này trong đb => cho thêm vào giỏ hàng
	if(isset($_SESSION['gio_hang'][$ma_san_pham])) {
		echo "<script>
		alert('Đã có sản phẩm trong giỏ hàng !');
		window.history.back(-1);
		</script>";
		exit();
	}
	else {
		$_SESSION['gio_hang'][$ma_san_pham] = 1;
		echo "<script>
		alert('Đã thêm vào giỏ hàng !');
		window.history.back(-1);
		</script>";
		exit();
	}
} else {
	echo "<script>
	alert('Không có thú cưng này !');
	window.history.back(-1);
	</script>";
	exit();
}