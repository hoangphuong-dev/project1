<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php 
include('connect.php');
$thu_muc_anh = '../../image/';
$sql_anh_logo = "select * from anh where ma = 1";
$result_logo = mysqli_query($connect, $sql_anh_logo);
$each_logo = mysqli_fetch_array($result_logo);
$sql_header = "select * from anh where ma = 2";
$result_header = mysqli_query($connect, $sql_header);
$each_header = mysqli_fetch_array($result_header);
?>
<div class="div_header">
	<div class="div_giua admin" style="margin: auto; float: none; width: 90%;">
		<div class="div_logo">
			<a href="../common/trang_chu_admin.php"><img width="60%" height="100%" src="<?php echo $thu_muc_anh . $each_logo['ten_ma_hoa'] ?>" alt="đây là logo"></a>
		</div>
		<div class="div_tim_kiem" style="width: 75%;"><img src="<?php echo $thu_muc_anh . $each_header['ten_ma_hoa'] ?>" height="100%">
		</div>
		<div class="div_chao">
			<i class="fa fa-user-circle-o" style="font-size: 45px"></i> <br>
			<?php echo $_SESSION['ten_admin'] ?>
		</div>
	</div>
</div>

