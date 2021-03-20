<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="CSS/user.css">
	<style>
		/* khi giỏ có hàng */
		.div_gio_hang_co_san_pham{
			width: 100%;
			height: auto;
			margin: auto;
		}
		.div_duong_dan {
			width: 100%;
			float: left;
			height: 50px;
			margin-bottom: 50px;

		}
		.div_duong_dan button {
			font-size: 15px;
			padding-top: 10px;
			margin-top: 10px;
			background: #E7E7E7;
			border-radius: 3px;
			border: none;
			width: 170px ;
			height: 35px;
			opacity: 0.8
		}
		.div_duong_dan a {
			text-decoration: none;
			color: #FF0000;
		}
		.div_tren {
			width: 100%;
			height: 50px;
			float: left;
			margin-bottom: 20px;
			border-bottom: 2px solid #E3E3E3;
			border-radius: 3px;
		}
		.anh,
		.ten,
		.gia,
		.so_luong,
		.tong,
		.xoa {
			width: 40%;
			height: 40px;
			float: left;
			text-align: center;
			padding-top: 10px;
			white-space: nowrap;
			font-size: 17px;
		}
		.xoa {
			width: 10%;
		}
		.div_duoi >.anh,
		.div_duoi >.ten,
		.div_duoi >.gia,
		.div_duoi >.so_luong,
		.div_duoi >.tong,
		.div_duoi >.xoa {
			height: 150px;
			padding-top: 40px;
			font-size: 17px;
		}
		.div_duoi >.so_luong > button {
			width: 30px;
			border: none;
			font-size: 15px;
			height: 20px;
		}
		.div_duoi >.so_luong > button a {
			text-decoration: none;
			color: black;
		}
		.div_duoi {
			width: 100%;
			float: left;
			border-bottom: 1px solid #E3E3E3;
		}
		.div_thong_tin_nguoi_nhan {
			float: left;
			width: 60%;
			height: auto;
			/* background: red; */
			margin-top: 20px;
			border-right: 1px solid black;
		}

		.div_thong_tin_nguoi_nhan h1 {
			margin-bottom: 20px;
		}
		.div_thong_tin_nguoi_nhan p {
			margin-top: 10px;
			font-size: 17px;
		}
		.div_thong_tin_nguoi_nhan span {
			color: red;
		}
		.div_hoan_tat_don_hang {
			float: left;
			width: 40%; 
			height: auto; 
			/* background: green; */
			margin-top: 20px;
		}
		.div_hoan_tat_don_hang a {
			text-decoration: none;
			color: red;
		}
		.div_hoan_tat_don_hang h1 {
			padding-left: 20px;
		}
		.div_hoan_tat_don_hang table {
			width: 70%;
			font-size: 23px;
			text-align: right;
			margin: 20px 30%;
		}
		.div_hoan_tat_don_hang table td {
			padding: 10px;
		}
		.div_hoan_tat_don_hang button {
			font-size: 20px;
			width: 30%;
			padding: 5px;
			margin-left: 70%;
			border-radius: 3px;
			background: lightgreen;
		}
		.div_hoan_tat_don_hang button :hover {
			opacity: 0.8;
		}
		/* khi giỏ không có hàng  */
		.gio_hang_trong{
			width: 80%; 
			margin: auto; 
			height: 500px;
		}
		.gio_hang_trong img{ /* ảnh của giỏ hàng trống  */
			width: 340px;
			height: 200px;
			margin-top: 50px; 
			margin-left: 450px
		}
		.gio_hang_trong h3{
			margin-left: 400px;
		}
		.gio_hang_trong button{
			margin-left: 500px; 
			padding: 10px; 
			background: #F0F0ED; 
			border-radius: 3px;  
			margin-top: 50px; 
			font-size: 23px
		}
		.gio_hang_trong button:hover{
			background: #F9B234;
		}
	</style>
</head>
<body>
	<?php
	include('include/head.php');
	include('include/menu.php');
	include('Admin/common/connect.php');
	if(isset($_GET['ma_loai_thu_cung'])) {
		$ma_loai_thu_cung = $_GET['ma_loai_thu_cung'];
		echo "<script> window.location.replace('../doAn1/?ma_loai_thu_cung=$ma_loai_thu_cung');</script>";
	}
	$thu_muc_anh = 'image/';
	$tong = 0; 
	?>
	<?php if(!empty($_SESSION['gio_hang'])) { ?>
		<div style="width: 90%; margin: auto">
			<div class="div_gio_hang_co_san_pham">
				<div class="div_duong_dan">
					<a href="../doAn1/">
						<button>
							<div style="font-size: 20px; color: #23527C; margin-top: -8px;margin-left: 10px ; transform: rotate(180deg);width: 30px; height: 30px;float: left; text-align: right; border: none">&#10150;</div>Tiếp tục mua hàng
						</button>
					</a>
					<button style="margin-left: 74.6%; padding-top: 0">
						<a href="user/xoa_gio_hang.php" onclick="return confirm('Bạn chắc chắn muốn xoá tất cả thú cưng  ?')">
							Xóa giỏ hàng 
							<i class="fa fa-trash" style="padding-left: 10px; font-size: 23px"></i>
						</a>
					</button>
					<h2 style="padding-top: 10px">Thông tin giỏ hàng</h2>
				</div>
				<div class="div_tren">
					<div style="width: 20%" class="anh">Ảnh thú cưng </div>
					<div style="width: 30%" class="ten">Tên thú cưng </div>
					<div class="tong">Giá bán</div>
					<div class="xoa">Xoá thú cưng </div>
				</div>
				<?php foreach ($_SESSION['gio_hang'] as $ma_thu_cung => $so_luong) { ?>
					<?php
					$sql = "select * from thu_cung where ma = '$ma_thu_cung'";
					$result = mysqli_query($connect,$sql);
					$each = mysqli_fetch_array($result);
					?>
					<div class="div_duoi">
						<div class="anh" style="width: 20%; padding-top: 0">
							<div style="margin-left: 30%; width: 45%;height: 90%;background-image: url('<?php echo $thu_muc_anh . $each['anh'] ?>');background-position: center center; background-size: cover;" ></div>
						</div>
						<div style="width: 30%" class="ten">
							<?php echo $each['ten'] ?>
						</div>
						<div class="gia"><?php echo number_format($each['gia_ban']); ?> đ</div>
						<?php $tong += $each['gia_ban']?>
						<div class="xoa">
							<a style="color: red" href="user/xoa_thu_cung_trong_gio_hang.php?ma=<?php echo $ma_thu_cung ?>" onclick="return confirm('Bạn chắc chắn muốn xoá thú cưng này trong giỏ hàng ?')">
								<i class="fa fa-trash" style="font-size: 22px"></i>
							</a>
						</div>
					</div>
				<?php } ?>

				<?php
				$ma = $_SESSION['ma'];
				$sql = "select * from khach_hang where ma = '$ma'";
			// die($sql);
				$result = mysqli_query($connect,$sql);
				$each = mysqli_fetch_array($result);
				?>
				<form action="user/process_dat_hang.php" method="post">
					<div class="div_thong_tin_nguoi_nhan">
						<h1>Thông tin người nhận </h1>
						<p>Họ tên :<span>*</span></p>
						<input type="text" name="ten_nguoi_nhan" value=" <?php echo $each['ten'] ?>">
						<br>
						<p>Số điện thoại :<span>*</span></p>
						<input type="text" name="sdt_nguoi_nhan" value=" <?php echo $each['sdt'] ?>">
						<br>
						<p>Địa chỉ nhận hàng :<span>*</span></p>
						<input type="text" name="so_nha" placeholder="Nhập địa chỉ..">
						<br>
						<table width="70%">
							<tr>
								<td>
									Tỉnh/Thành phố :<span>*</span>
								</td>
								<td>
									Quận/Huyện :<span>*</span>
								</td>
							</tr>
							<tr>
								<td>
									<select style="width: 90%;" name="select_tinh"></select>
								</td>
								<td>
									<select style="width: 100%;" name="select_huyen"></select>
								</td>
							</tr>
						</table>
					</div>
					<div class="div_hoan_tat_don_hang">
						<h1>Hoàn tất đơn hàng</h1>
						<table>
							<tr>
								<td>Đơn hàng :</td>
								<td><?php echo number_format($tong); ?> đ</td>
							</tr>
							<tr>
								<td>Phí giao :</td>
								<td>0 đ</td>
							</tr>
							<tr>
								<td>Tổng cộng :</td>
								<td><span style="color: red"><?php echo number_format($tong);?></span> đ</td>
							</tr>
						</table>
						<button>Đặt hàng &#10149;</button>
					</div>
				</form>

			</div>


		<?php }  else { ?>
			<div class="gio_hang_trong">
				<img src="image/gio_hang.png" alt="đây là ảnh giỏ hàng">
				<h3>Không có thú cưng nào trong giỏ hàng của bạn</h3>
				<button><a style="text-decoration: none; color: black" href="../doAn1/">Tiếp tục mua sắm</a></button>
			</div>
		<?php } ?>
	</div>
	<?php include('include/footer.php') ?>

	<script type="text/javascript" src="include/JS/a1.js"></script>
	<script type="text/javascript" src="include/JS/a2.js"></script>
	<script type="text/javascript" src="include/JS/a3.js"></script>
</body>
</html>