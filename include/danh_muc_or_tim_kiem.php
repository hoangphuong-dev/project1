<?php if(isset($_GET['ma_loai_thu_cung']) || isset($_GET['tim_kiem'])) { ?><!-- nếu có danh mục và tìm kiếm --> 
<div class="div_content" style="width: 90%; background: #F1F3F6;margin: auto; float: none;">
	<?php
	$tim_kiem ='';
	if(isset($_GET['tim_kiem'])) $tim_kiem = trim($_GET['tim_kiem']);
	if(!empty($tim_kiem) && !empty($_GET['ma_loai_thu_cung'])) { // nếu có cả mã loại thú cưng và tìm kiếm 
		$ma_loai_thu_cung = $_GET['ma_loai_thu_cung'];
		$sql = " $sql and thu_cung.ten like '%$tim_kiem%' and thu_cung.ma_loai_thu_cung = '$ma_loai_thu_cung'
		or thu_cung.ma not in ( 
		SELECT hoa_don_chi_tiet.ma_thu_cung 
		from hoa_don 
		JOIN hoa_don_chi_tiet on hoa_don.ma = hoa_don_chi_tiet.ma_hoa_don 
		WHERE hoa_don.tinh_trang in (1,2)) and loai_thu_cung.ten like '%$tim_kiem%' and thu_cung.ma_loai_thu_cung = '$ma_loai_thu_cung'";
	}
	// nếu có tìm kiếm và không có loại thú cưng
	if(!empty($tim_kiem) && empty($_GET['ma_loai_thu_cung'])) $sql = "$sql and thu_cung.ten like '%$tim_kiem%' or loai_thu_cung.ten like '%$tim_kiem%'";
	// nếu có loại thú sưng mà không có tìm kiếm 
	if(!empty($_GET['ma_loai_thu_cung']) && empty($tim_kiem)) {
		$ma_loai_thu_cung = $_GET['ma_loai_thu_cung'];
		$sql = "$sql and thu_cung.ma_loai_thu_cung = '$ma_loai_thu_cung'";
	} 
	// die($sql);
	$result = mysqli_query($connect,$sql);
	$tong_so_thu_cung = mysqli_num_rows($result);
	$so_thu_cung_1_trang = 8;
	$tong_so_trang = ceil($tong_so_thu_cung / $so_thu_cung_1_trang);
	$trang_hien_tai = 1;
	if(isset($_GET['trang'])) $trang_hien_tai = $_GET['trang'];
	$so_thu_cung_can_bo_qua = ($trang_hien_tai - 1) * $so_thu_cung_1_trang;
	$sql = "$sql
	limit $so_thu_cung_1_trang offset $so_thu_cung_can_bo_qua";
	$result = mysqli_query($connect,$sql);
	?>
	<!-- lấy theo tìm kiếm và danh mục  -->
	<div class="div_noi_dung">
		<?php 
		$ma_loai_thu_cung = $_GET['ma_loai_thu_cung'] ?? '';
		$sql_loai_thu_cung = "select ten from loai_thu_cung where ma = '$ma_loai_thu_cung'";
		$a = mysqli_query($connect, $sql_loai_thu_cung); 
		$each_loai_thu_cung = mysqli_fetch_array($a);
		if(isset($_GET['tim_kiem']) && isset($_GET['ma_loai_thu_cung'])) { ?>
			<h2 class="duong_dan" style="text-align: justify; font-size: 20px;"><a style="text-decoration: none; color: #FF9900;" href="../doAn1/">Trang chủ</a> / Danh mục thú cưng : <?php echo $each_loai_thu_cung['ten'] ?> / <span style="color: red;">Từ khoá tìm kiếm : <?php echo $tim_kiem; ?></span></h2> 
		<?php } else if(isset($_GET['ma_loai_thu_cung'])) { ?>
			<h2 class="duong_dan" style="text-align: justify; font-size: 20px;"><a style="text-decoration: none; color: #FF9900;" href="../doAn1/">Trang chủ</a> / Danh mục thú cưng : <?php echo $each_loai_thu_cung['ten'] ?></h2>
		<?php } else { ?>
			<h2 class="duong_dan" style="text-align: justify; font-size: 20px;"><a style="text-decoration: none; color: #FF9900;" href="../doAn1/">Trang chủ</a> / <span style="color: red;">Từ khoá tìm kiếm : <?php echo $tim_kiem; ?></span></h2> 
		<?php } ?>
		<?php foreach ($result as $each) :?>
			<figure class="div_tung_sp" style="width: 20%; margin-left: 50px; ">
				<div class="image">
					<a href="xem_chi_tiet.php?ma=<?php echo $each['ma'] ?>"><img src="<?php echo $thu_muc_anh . $each['anh'] ?>"></a>
					<a href="xem_chi_tiet.php?ma=<?php echo $each['ma'] ?>" class="icons">Xem chi tiết</a>
					<?php if(isset($_SESSION['ma'])) { ?>
						<a href="user/them_thu_cung_vao_gio_hang.php?ma=<?php echo $each['ma'] ?>" class="add-to-cart">Thêm vào giỏ hàng</a>
					<?php } ?>
				</div>
				<figcaption>
					<a style="text-decoration: none" href="xem_chi_tiet.php?ma=<?php echo $each['ma'] ?>"><h3><?php echo $each['ten'] ?></h3></a>
					<div class="price"><?php echo number_format($each['gia_ban']); ?>đ</div>
				</figcaption>
			</figure>
		<?php endforeach ?>
		<?php if($trang_hien_tai > ($tong_so_trang + 1)) echo "<script> alert('Trang này không tồn tại !'); window.history.back(-1); </script>";?>
		<div class="div_so_trang">
			<a>&laquo;</a>
			<?php for($i = 1; $i <= $tong_so_trang; $i++) { ?>
				<a <?php if($trang_hien_tai == $i) { ?> class="active" <?php } ?> href="?trang=<?php echo $i ?><?php if(!empty($tim_kiem)){?>&tim_kiem=<?php echo $tim_kiem ?><?php } ?>">
					<?php echo $i ?>
				</a>
			<?php } ?>
			<a>&raquo;</a>
		</div>
	</div>
</div>
<?php }?>