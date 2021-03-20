<?php include('../check_admin.php') ?>
<!doctype html>
<html>
<head>
	<title>quản lý thú cưng</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../css/admin.css">
	<link rel="stylesheet" href="../../css/user.css">
</head>
<body>
	<?php
	$thu_muc_anh = '../../image/';
	require '../common/connect.php';
	$tim_kiem ='';
	if(isset($_GET['tim_kiem'])) $tim_kiem = trim($_GET['tim_kiem']);
	$sql = "select 
	thu_cung.*,
	loai_thu_cung.ten as 'ten_loai_thu_cung',
	xuat_xu.ten_quoc_gia,
	mau_long.ten as 'ten_mau_long'
	from thu_cung
	join loai_thu_cung on thu_cung.ma_loai_thu_cung = loai_thu_cung.ma
	join xuat_xu on thu_cung.ma_xuat_xu = xuat_xu.ma
	join mau_long on thu_cung.ma_mau_long = mau_long.ma 

	where thu_cung.ten like '%$tim_kiem%' or 
	loai_thu_cung.ten like '%$tim_kiem%'



	order by thu_cung.ma desc";
	$result = mysqli_query($connect,$sql);
	$tong_so_thu_cung = mysqli_num_rows($result);
	$so_thu_cung_1_trang = 5;
	$tong_so_trang = ceil($tong_so_thu_cung / $so_thu_cung_1_trang);
	$trang_hien_tai = 1;
	if(isset($_GET['trang'])) $trang_hien_tai = $_GET['trang'];
	$so_thu_cung_can_bo_qua = ($trang_hien_tai - 1) * $so_thu_cung_1_trang;
	$sql = "$sql
	limit $so_thu_cung_1_trang offset $so_thu_cung_can_bo_qua";
	$result = mysqli_query($connect,$sql);
	?>
	<?php include('../common/header_admin.php') ?>
	<?php include('../common/menu_admin.php') ?>
	<div class="div_tong" >
		<div class="div_content">
			<div class="all_table kh">
				<button class="quay_lai" onclick="window.history.back();">
					<i class="fa fa-reply"></i>Quay lại
				</button> <br>
				<div class="div_1">
					<div class="tong_san_pham">
						<h3>
							Có tất cả <?php echo $tong_so_thu_cung ?> thú cưng 
						</h3>
						<p><?php if(isset($_GET['tim_kiem'])) {echo "Từ khoá tìm kiếm :". $tim_kiem;}?></p>
					</div>
					<div class="tim_kiem">
						<form>
							<input type="search" placeholder="Tên thú cưng, loại thú cưng..." name="tim_kiem" value="<?php echo $tim_kiem ?>">
							<button type="submit">
								<i class="fa fa-search"></i>
							</button>
						</form>
					</div>
				</div>
				<div class="div_table">
					<table border="1">
						<tr id="ROW1">
							<td>Tên thú cưng</td>
							<td>Ảnh</td>
							<td>Giá bán</td>
							<td>Đặc điểm</td>
							<td>Cách chăm sóc</td>
							<td>Xuất xứ</td>
							<td>Màu lông</td>
							<td>Giống</td>
							<td>Cân nặng</td>
							<td>Loại thú cưng</td>
							<td>Sửa thông tin</td>
							<?php if($_SESSION['cap_do'] == 1) { ?><td>Xoá thú cưng</td><?php } ?>
						</tr>
						<?php foreach ($result as $each): ?>	
							<tr>
								<td>
									<?php echo $each['ten']?>
								</td>
								<td>
									<img width="100px" height="180px" src=" <?php echo $thu_muc_anh . $each['anh'] ?>">
								</td>
								<td>
									<p style="width: 100px">
										<?php echo number_format($each['gia_ban']); ?> đ
									</p>
								</td>
								<td>
									<p style="width: 200px">
										<?php echo nl2br($each['dac_diem'])?>
									</p>
								</td>
								<td>
									<p style="width: 200px">
										<?php echo substr($each['cach_cham_soc'],1825)?>
									</p>
								</td>
								<td>
									<?php echo $each['ten_quoc_gia']?>
								</td>
								<td>
									<?php echo $each['ten_mau_long']?>
								</td>
								<td>
									<?php if($each['gioi_tinh']==1) {echo "đực";} else {echo "cái";} ?>
									
								</td>
								<td style="width: 100px">	
									<?php echo $each['can_nang_nho_nhat']. ' - '; echo $each['can_nang_lon_nhat']. '(kg) ';  ?>
								</td>
								<td>
									<?php echo $each['ten_loai_thu_cung']?>
								</td>
								<td>
									<a href="update_thu_cung.php?action=2&ma=<?php echo $each['ma'] ?>"><center><img src="../../image/edit.png" width="30" height="30" /></center></a>
								</td>
								<?php if($_SESSION['cap_do'] == 1) { ?>
									<?php 
									$ma = $each['ma'];
									$sql_ma = "select ma_thu_cung from hoa_don_chi_tiet where ma_thu_cung = $ma";
									$result_ma = mysqli_query($connect, $sql_ma);
									$count = mysqli_num_rows($result_ma);
									?>
									<?php if($count == 0) { ?>
										<td>
											<a href="process.php?action=0&ma=<?php echo $each['ma'] ?>" onclick="return confirm('bạn chắc chắn muốn xoá thú cưng này chứ?')"><center><i class="fa fa-trash-o" style="font-size:30px; color: red"></i></center></a>
										</td>
									<?php } ?>
								<?php } ?>
							</tr>
						<?php endforeach?>	
					</table>
				</div>
				<?php if($trang_hien_tai > ($tong_so_trang + 1)) echo "<script> alert('trang này không tồn tại !'); window.history.back(-1); </script>";?>
				<div class="div_so_trang">

					<?php for($i = 1; $i <= $tong_so_trang; $i++) { ?>
						<a <?php if($trang_hien_tai == $i) { ?> class="active" <?php } ?> href="?trang=<?php echo $i ?><?php if(!empty($tim_kiem)){?>&tim_kiem=<?php echo $tim_kiem ?><?php } ?>">
							<?php echo $i ?>
						</a>
					<?php } ?>

				</div>
				<button></button>
			</div>
			<?php mysqli_close($connect) ?>
		</div>
		<?php include('../common/footer_admin.php') ?>
	</div>
	<script type="text/javascript" src="../../include/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../../include/js/menu.js"></script>
</body>
</html>