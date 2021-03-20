<?php session_start()?>
<?php if(empty($_GET['ma'])) header("location:index.php") ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="CSS/user.css">
	<style>
		.tren,
		.duoi {
			width: 80%;
			margin: auto;
			padding-top: 3px;
		}
		.div_anh {
			width: 40%;
			/* background: red; */
			height: auto;
			float: left;
			margin-top: 2%;
			border-radius: 5px;
		}
		.div_chi_tiet {
			width: 60%;
			/* background: green; */
			height: 800px;
			float: left;
			padding-left: 8%;
		}
		.tren h2 {
			padding-top: 10px;
			padding-bottom: 20px;
			font-size: 25px;
			font-weight: 500;

		}
		.check {
			color: lightgreen;
			padding:  10px 20px 10px 40px;
		}
		.gia_ban{
			color: red;
			font-size: 20px;
		}
		.chi_tiet{
			line-height: 1.8;
			padding-left: 18%;
			font-size: 15px;
		}
		.black{
			color: black;
		}

		.duoi button{
			width: 200px;
			padding: 10px;
			font-size: 16px;
			margin: 10px 0px 20px 80%;
			background: black;
			border-radius: 3px;
			text-transform: uppercase;
			transition: 0.2s;
		}
		.duoi button:hover{
			background: #F9B234;
		}
		.duoi button a{
			color: white;
			text-decoration: none;
		}
	</style>
</head>
<body>
	<div class="div_tong" >
		<?php 
		include('include/head.php');
		include('include/menu.php');
		if(isset($_GET['ma_loai_thu_cung'])) {
			$ma_loai_thu_cung = $_GET['ma_loai_thu_cung'];
			echo "<script> window.location.replace('../doAn1/?ma_loai_thu_cung=$ma_loai_thu_cung');</script>";
		}
		$thu_muc_anh = 'image/';
		if(isset($_GET['ma'])) $ma = $_GET['ma']; // mã sản phẩm
		include 'Admin/common/connect.php';
		$sql_check_thu_cung = "select ma from thu_cung where ma = '$ma'";
		$result_check_thu_cung = mysqli_query($connect, $sql_check_thu_cung);
		$dem_ket_qua = mysqli_num_rows($result_check_thu_cung);
		if($dem_ket_qua == 1) {
			$sql = "select
			thu_cung.*,
			loai_thu_cung.ten as 'ten_loai_thu_cung',
			mau_long.ten as 'ten_mau_long',
			xuat_xu.ten_quoc_gia
			from thu_cung
			join loai_thu_cung on thu_cung.ma_loai_thu_cung = loai_thu_cung.ma
			join mau_long on thu_cung.ma_mau_long = mau_long.ma
			join xuat_xu on thu_cung.ma_xuat_xu = xuat_xu.ma
			where thu_cung.ma = '$ma'";
			$result = mysqli_query($connect,$sql);
			$each = mysqli_fetch_array($result);
		} else {
			include('dang_cap_nhat.php');
			include('include/footer.php');
			exit();
		}
		?>
		<div class="tren">
			<div class="div_anh">
				<img style="width: 100%; height: 750px; border-radius: 5px;"  src="<?php echo $thu_muc_anh . $each['anh'] ?>">
			</div>
			<div class="div_chi_tiet">
				<h2>Tên thú cưng : <?php echo $each['ten'] ?></h2>
				<span class="gia_ban black">Giá bán : </span>
				<span class="gia_ban"><?php echo number_format($each['gia_ban'])?>VNĐ</span>
				<h2>&#9670 Mô tả chi tiết</h2>
				<p><i class="fa fa-check check"></i>Giống chó : <?php echo $each['ten_loai_thu_cung'] ?></p>
				<p><i class="fa fa-check check"></i>Xuất xứ : <?php echo $each['ten_quoc_gia'] ?></p>
				<p><i class="fa fa-check check"></i>Màu lông : <?php echo $each['ten_mau_long'] ?></p>
				<p><i class="fa fa-check check"></i>Cân nặng : <?php echo $each['can_nang_nho_nhat']. ' - '; echo $each['can_nang_lon_nhat']. '(kg) ';?></p>
				<p><i class="fa fa-check check"></i>Giới tính : <?php if($each['gioi_tinh'] == 1) echo "đực"; else echo "cái" ?></p>
				<p><i class="fa fa-check check"></i>Đặc điểm : </p>
				<p class="chi_tiet"><?php echo nl2br($each['dac_diem']) ?></p>
			</div>
		</div>
		<div class="duoi">
			<p><i class="fa fa-check check"></i>Cách chăm sóc : </p>
			<p class="chi_tiet" style="	padding: 0 20px 0;"><?php echo nl2br($each['cach_cham_soc']) ?></p>
			<?php if(isset($_SESSION['ma'])) { ?>
				<button>
					<a href="user/them_thu_cung_vao_gio_hang.php?ma=<?php echo $each['ma'] ?>" class="add-to-cart">Thêm vào giỏ hàng</a>
				</button>
			<?php } else { ?> 
				<button>
					<a onclick="document.getElementById('id_dang_nhap').style.display='block'" href="#" class="add-to-cart">Thêm vào giỏ hàng</a>
				</button>
			<?php } ?>
		</div>
		<?php include('include/footer.php') ?>
	</div>
	<script type="text/javascript" src="include/JS/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="include/JS/menu.js"></script>
</body>
</html>

