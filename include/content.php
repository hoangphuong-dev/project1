<?php 
$thu_muc_anh = 'image/';
include 'Admin/common/connect.php';
$sql = "select thu_cung.*,
loai_thu_cung.ten as 'ten_loai_thu_cung'
FROM thu_cung
join loai_thu_cung on thu_cung.ma_loai_thu_cung = loai_thu_cung.ma
WHERE thu_cung.ma not in (
SELECT hoa_don_chi_tiet.ma_thu_cung from hoa_don
JOIN hoa_don_chi_tiet on hoa_don.ma = hoa_don_chi_tiet.ma_hoa_don
WHERE hoa_don.tinh_trang in (1,2))"; ?>



<div class="div_content" style="width: 90%; background: #F1F3F6;margin: auto; float: none;">
	<?php if(isset($_GET['ma_loai_thu_cung']) || isset($_GET['tim_kiem'])) { ?><!-- nếu có danh mục và tìm kiếm -->
	<div class="div_noi_dung">
		<?php
		$tim_kiem ='';
		if(isset($_GET['tim_kiem'])) $tim_kiem = addslashes(trim($_GET['tim_kiem']));
		if(isset($_GET['ma_loai_thu_cung'])) $ma_loai_thu_cung = $_GET['ma_loai_thu_cung'];
if(!empty($tim_kiem) && !empty($_GET['ma_loai_thu_cung'])) { // nếu có cả mã loại thú cưng và tìm kiếm 

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
if(!empty($_GET['ma_loai_thu_cung']) && empty($tim_kiem)) $sql = "$sql and thu_cung.ma_loai_thu_cung = '$ma_loai_thu_cung'";
// die($sql);
$result = mysqli_query($connect,$sql);
$tong_so_thu_cung = mysqli_num_rows($result);
if($tong_so_thu_cung == 0) include('dang_cap_nhat.php');
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
	
	<?php for($i = 1; $i <= $tong_so_trang; $i++) { ?>
		<a <?php if($trang_hien_tai == $i) { ?> class="active" <?php } ?> href="?trang=<?php echo $i ?><?php if(isset($tim_kiem)){?>&tim_kiem=<?php echo $tim_kiem ?><?php } ?>">
			<?php echo $i ?>
		</a>
	<?php } ?>
	
</div>
</div>


<?php } else { ?>
	<!-- in ra tất cả thú cưng -->
	<?php 
	$sql_loai_ban_chay = "$sql and loai_thu_cung.ma in (SELECT bang_phu.ma from 
	(SELECT loai_thu_cung.ma
	from
	hoa_don_chi_tiet
	join thu_cung on thu_cung.ma = hoa_don_chi_tiet.ma_thu_cung
	join loai_thu_cung on thu_cung.ma_loai_thu_cung = loai_thu_cung.ma
	GROUP BY loai_thu_cung.ma
ORDER BY COUNT(hoa_don_chi_tiet.ma_thu_cung) DESC limit 1) as bang_phu)"; // vẫn là câu query lấy tất cả thú cưng nè 
// die($sql);
$result_loai_ban_chay = mysqli_query($connect,$sql_loai_ban_chay);
?>
<div class="div_noi_dung">
	<h2 class="duong_dan">Loại thú cưng bán chạy nhất</h2>
	<div class="swiper-container">
		<div class="swiper-wrapper">
			<?php foreach ($result_loai_ban_chay as $each) :?>
				<div class="swiper-slide">
					<figure class="div_tung_sp">
						<div class="image">
							<a href="xem_chi_tiet.php?ma=<?php echo $each['ma'] ?>"><img src="<?php echo $thu_muc_anh . $each['anh'] ?>"></a>
							<a href="xem_chi_tiet.php?ma=<?php echo $each['ma'] ?>" class="icons">Xem chi tiết</a>
							<?php if(isset($_SESSION['ma'])) { ?>
								<a href="user/them_thu_cung_vao_gio_hang.php?ma=<?php echo $each['ma'] ?>" class="add-to-cart">Thêm vào giỏ hàng</a>
							<?php }?>
						</div>
						<figcaption>
							<a style="text-decoration: none" href="xem_chi_tiet.php?ma=<?php echo $each['ma'] ?>"><h3><?php echo $each['ten'] ?></h3></a>
							<div class="price"><?php echo number_format($each['gia_ban']); ?>đ</div>
						</figcaption>
					</figure>
				</div>
			<?php endforeach ?>
		</div>
		<div class="swiper-button-next"></div>
		<div class="swiper-button-prev"></div>
	</div>
</div>

<!-- in ra thú cưng mới về  -->
<?php 
$sql = "$sql ORDER BY thu_cung.ma DESC limit 9"; // câu query cũ và order by cho nó  // tìm hiểu tại sao không limit 10 được chỗ này 
$result = mysqli_query($connect,$sql);
?>
<div class="div_noi_dung">
	<h2 class="duong_dan">Thú cưng mới về</h2>
	<div class="swiper-container">
		<div class="swiper-wrapper">
			<?php foreach ($result as $each) :?>
				<div class="swiper-slide">
					<figure class="div_tung_sp">
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
				</div>
			<?php endforeach ?>
		</div>
		<div class="swiper-button-next"></div>
		<div class="swiper-button-prev"></div>
		<!-- <div class="swiper-pagination"></div> -->
	</div>
</div>


<!-- in ra thú cưng mới về  -->
<?php 
$sql_dat_nhat = "select * from thu_cung order by gia_ban DESC limit 8"; // câu query cũ và order by cho nó  // tìm hiểu tại sao không limit 10 được chỗ này 
$result_dat_nhat = mysqli_query($connect,$sql_dat_nhat);
?>
<div class="div_noi_dung">
	<h2 class="duong_dan">Thú cưng đắt nhất</h2>
	<div class="swiper-container">
		<div class="swiper-wrapper">
			<?php foreach ($result_dat_nhat as $each) :?>
				<div class="swiper-slide">
					<figure class="div_tung_sp">
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
				</div>
			<?php endforeach ?>
		</div>
		<div class="swiper-button-next"></div>
		<div class="swiper-button-prev"></div>
		<!-- <div class="swiper-pagination"></div> -->
	</div>
</div>






<div class="div_so_trang"></div>







<?php } ?>
</div>
<?php mysqli_close($connect) ?>