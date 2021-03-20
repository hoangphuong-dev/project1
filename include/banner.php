<?php 
include('Admin/common/connect.php');
$thu_muc_anh = 'image/';
$sql_banner1 = "select * from anh where ma = 4";
$result_banner1 = mysqli_query($connect, $sql_banner1);
$each_banner1 = mysqli_fetch_array($result_banner1);
$sql_banner2 = "select * from anh where ma = 5";
$result_banner2 = mysqli_query($connect, $sql_banner2);
$each_banner2 = mysqli_fetch_array($result_banner2);
$sql_banner3 = "select * from anh where ma = 6";
$result_banner3 = mysqli_query($connect, $sql_banner3);
$each_banner3 = mysqli_fetch_array($result_banner3);
?>
<div class="div_banner">
	<img class="mySlides" style="width:100%; height: 420px" src="<?php echo $thu_muc_anh . $each_banner1['ten_ma_hoa'] ?>" alt="Đây là banner">
	<img class="mySlides" style="width:100%; height: 420px" src="<?php echo $thu_muc_anh . $each_banner2['ten_ma_hoa'] ?>" alt="Đây là banner">
	<img class="mySlides" style="width:100%; height: 420px" src="<?php echo $thu_muc_anh . $each_banner3['ten_ma_hoa'] ?>" alt="Đây là banner">
</div>
<script>
	var myIndex = 0;
	carousel();
	function carousel() {
		var i;
		var x = document.getElementsByClassName("mySlides");
		for (i = 0; i < x.length; i++) {
			x[i].style.display = "none";
		}
		myIndex++;
		if (myIndex > x.length) {myIndex = 1}
			x[myIndex-1].style.display = "block";
		setTimeout(carousel, 10000);
	}
</script>


