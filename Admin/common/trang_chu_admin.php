<?php include('../check_admin.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../CSS/admin.css">
	<link rel="stylesheet" href="../../CSS/user.css">
	<style type="text/css">
		.div_content table {
			border-radius: 5px;
		}
		.all_table table td {
			padding: 10px 0 10px 5px;
			font-size: 18px;
			font-weight:500;
		}
		.all_table h2  {
			text-align: center;font-size: 25px;
		}
		.all_table h1 {
			padding: 30px 0 40px 0;text-align: center;
		}
		.all_table >.phai,
		.all_table >.trai {
			width: 48%; float: left;
			margin-left: 20px;
			border-radius: 10px;
		}
	</style>
</head>
<body>
	<?php 
	include('../common/header_admin.php');
	include('menu_admin.php');
	include('../common/connect.php');
// lấy doanh thu
	$sql_doanh_thu = "select 
	sum(if(hoa_don.tinh_trang=2 and month(thoi_gian_mua) = month(CURRENT_DATE()) and year(thoi_gian_mua) = year(CURRENT_DATE()), hoa_don_chi_tiet.gia,0)) as 'da_co_thang_nay',
	sum(if(hoa_don.tinh_trang=1 and month(thoi_gian_mua) = month(CURRENT_DATE()) and year(thoi_gian_mua) = year(CURRENT_DATE()), hoa_don_chi_tiet.gia,0)) as 'du_kien_thang_nay',
	sum(if(hoa_don.tinh_trang=2 and YEAR(thoi_gian_mua) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH) AND MONTH(thoi_gian_mua) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH), hoa_don_chi_tiet.gia,0)) as 'da_co_thang_truoc',sum(if(hoa_don.tinh_trang=1 and YEAR(thoi_gian_mua) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH) AND MONTH(thoi_gian_mua) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH), hoa_don_chi_tiet.gia,0)) as 'du_kien_thang_truoc'
	from hoa_don join hoa_don_chi_tiet on hoa_don_chi_tiet.ma_hoa_don = hoa_don.ma";
	$result = mysqli_query($connect, $sql_doanh_thu); $each_doanh_thu = mysqli_fetch_array($result);
// lấy số hoá đơn 
	$sql_hoa_don = "select 
	count(
	if(tinh_trang = 2 and month(thoi_gian_mua) = month(CURRENT_DATE()) and year(thoi_gian_mua) = year(CURRENT_DATE()), ma, null)
	) as 'da_ban_thang_nay',
	count(if(tinh_trang = 1 and month(thoi_gian_mua) = month(CURRENT_DATE()) and year(thoi_gian_mua) = year(CURRENT_DATE()), ma, null)) as 'cho_xu_ly_thang_nay',
	count(if(tinh_trang = 2 and YEAR(thoi_gian_mua) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH) AND MONTH(thoi_gian_mua) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH), ma, null)) as 'da_ban_thang_truoc',
	count(if(tinh_trang = 1 and YEAR(thoi_gian_mua) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH) AND MONTH(thoi_gian_mua) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH), ma, null)) as 'cho_xu_ly_thang_truoc'
	FROM hoa_don";
	$result = mysqli_query($connect, $sql_hoa_don); $each_hoa_don = mysqli_fetch_array($result);
// lấy khách hàng 
	$sql_khach_hang = "select 
	count(ma) as 'tong_so_khach',
	count(if(month(ngay_dang_ky) = month(CURRENT_DATE()) and year(ngay_dang_ky) = year(CURRENT_DATE()),ma, null)) as 'thang_nay',
	count(if(YEAR(ngay_dang_ky) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH) AND MONTH(ngay_dang_ky) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH),ma, null)) as 'thang_truoc'
	from khach_hang";
	$result = mysqli_query($connect, $sql_khach_hang); $each_khach_hang = mysqli_fetch_array($result);
// lấy admin 
	$sql_admin = "select 
	COUNT(if(cap_do = 0, ma , null)) as 'admin', 
	COUNT(if(cap_do = 1, ma , null)) as 'super' 
	from admin";
	$result = mysqli_query($connect, $sql_admin); $each_admin = mysqli_fetch_array($result);
// lấy loại sản phẩm 
	$sql_loai_san_pham = "select 
	count(if(ten like '%cho%',ma, null)) as 'tong_so_loai_cho',
	count(if(ten like '%meo%',ma, null)) as 'tong_so_loai_meo'
	FROM loai_thu_cung";
	$result = mysqli_query($connect, $sql_loai_san_pham); $each_loai_san_pham = mysqli_fetch_array($result);
// lấy sản phẩm theo loại sản phẩm 
	$sql_sp_theo_loai = "select 
	COUNT(thu_cung.ma) as 'tong_thu_cung',
	loai_thu_cung.ma, loai_thu_cung.ten
	from loai_thu_cung, thu_cung
	WHERE thu_cung.ma_loai_thu_cung = loai_thu_cung.ma
	GROUP BY loai_thu_cung.ma, loai_thu_cung.ten";
	$result_sp_theo_loai = mysqli_query($connect, $sql_sp_theo_loai);
// lấy tổng sản phẩm 
	$sql_san_pham = "select count(ma) as 'tong_thu_cung' from thu_cung";
	$result = mysqli_query($connect, $sql_san_pham); $each_san_pham = mysqli_fetch_array($result);
// lấy sản phẩm giá cao nhất , thấp nhất
	$sql_sp_max = "select * FROM thu_cung WHERE gia_ban = (select max(gia_ban) FROM thu_cung)";
	$sql_sp_min = "select * FROM thu_cung WHERE gia_ban = (select min(gia_ban) FROM thu_cung)";
	$result_sp_max = mysqli_query($connect, $sql_sp_max);
	$result_sp_min = mysqli_query($connect, $sql_sp_min);
	// sản phẩm đã bán tháng này , tháng trước
	$sql_sp_da_ban = "SELECT 
	count(if(hoa_don.tinh_trang = 2 and  month(thoi_gian_mua) = month(CURRENT_DATE()) and year(thoi_gian_mua) = year(CURRENT_DATE()),ma_thu_cung,null)) as 'da_ban_thang_nay',
	count(if(hoa_don.tinh_trang = 2 and  YEAR(thoi_gian_mua) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH) AND MONTH(thoi_gian_mua) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH), ma_thu_cung,null)) as 'da_ban_thang_truoc'
	from hoa_don_chi_tiet join hoa_don on hoa_don.ma = hoa_don_chi_tiet.ma_hoa_don";
	$result = mysqli_query($connect, $sql_sp_da_ban); $each_sp = mysqli_fetch_array($result);
	// lấy hoá đơn có nhiều tiền nhất
	$sql_max_hoa_don_thang_truoc = "SELECT 
	hoa_don.ma,
	khach_hang.ten,
	sum(hoa_don_chi_tiet.gia) as 'tong_tien'
	from hoa_don
	join hoa_don_chi_tiet on hoa_don_chi_tiet.ma_hoa_don = hoa_don.ma
	join khach_hang on khach_hang.ma = hoa_don.ma_khach_hang
	GROUP BY hoa_don.ma, hoa_don.ma_khach_hang
	HAVING SUM(hoa_don_chi_tiet.gia) = (SELECT max(tkhd.tong_tien) from (
	SELECT 
	ma_hoa_don,sum(gia) as 'tong_tien'
	from hoa_don_chi_tiet
	GROUP BY ma_hoa_don ) as tkhd)";
	$result_max_hoa_don_thang_truoc = mysqli_query($connect, $sql_max_hoa_don_thang_truoc);
	$each_max_hoa_don_thang_truoc = mysqli_fetch_array($result_max_hoa_don_thang_truoc);
	?>
	<div class="div_tong" >
		<div class="div_content">
			<div class="all_table kh">
				<h1>Thống kê dữ liệu </h1>
				<div class="phai">
					
					<table border="1" style="margin-bottom: 20%;">
						<tr id="ROW1"><td colspan="3"><h2>Nhân sự</h2></td></tr>
						<tr>
							<td style="width: 35%">Số người quản lý</td>
							<td colspan="2">Gồm : <?php echo $each_admin['super']; ?> SuperAdmin, <?php echo $each_admin['admin']; ?> Admin</td>
						</tr>
						<tr>
							<td>Tổng số khách hàng</td>
							<td colspan="2"><?php echo $each_khach_hang['tong_so_khach']; ?></td>
						</tr>
						<tr>
							<td>Số khách đã đăng ký</td>
							<td>Tháng này : <?php echo $each_khach_hang['thang_nay'] ?></td>
							<td>Tháng trước : <?php echo $each_khach_hang['thang_truoc'] ?></td>
						</tr>
					</table>
					<table border="1">
						<tr id="ROW1"><td colspan="3"><h2>Kinh doanh</h2></td></tr>
						<tr>
							<td></td>
							<td>Tháng này</td>
							<td>Tháng trước</td>
						</tr>
						<tr>
							<td>Doanh thu đã có</td>
							<td><?php echo number_format($each_doanh_thu['da_co_thang_nay']) ?> VNĐ</td>
							<td><?php echo number_format($each_doanh_thu['da_co_thang_truoc']) ?> VNĐ</td>
						</tr>
						<tr>
							<td>Doanh thu dự kiến</td>
							<td><?php echo number_format($each_doanh_thu['du_kien_thang_nay']) ?> VNĐ</td>
							<td><?php echo number_format($each_doanh_thu['du_kien_thang_truoc']) ?> VNĐ</td>
						</tr>
						<tr>
							<td>Số đơn hàng đã bán</td>
							<td><?php echo $each_hoa_don['da_ban_thang_nay']?></td>
							<td><?php echo $each_hoa_don['da_ban_thang_truoc']?></td>
						</tr>
						<tr>
							<td>Số đơn hàng chưa xử lí <br>(chưa duyệt, chưa huỷ)</td>
							<td><?php echo $each_hoa_don['cho_xu_ly_thang_nay']?></td>
							<td><?php echo $each_hoa_don['cho_xu_ly_thang_truoc']?></td>
						</tr>
						<tr>
							<td>Đơn hàng có tổng tiền cao nhất</td>
							<td colspan="2">
								<table>
									<tr id="ROW1">
										<td>Tên khách hàng : </td>
										<td>Số tiền : </td>
									</tr>
									<tr>
										<td> <?php echo $each_max_hoa_don_thang_truoc['ten'] ?></td>
										<td> <?php echo number_format($each_max_hoa_don_thang_truoc['tong_tien']) ?> VNĐ</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div>
				<div class="trai">
					<table border="1" width="100%">
						<tr id="ROW1"><td colspan="2"><h2>Sản phẩm</h2></td></tr>
						<tr>
							<td style="width: 30%">Tổng số thú cưng</td>
							<td><?php echo $each_san_pham['tong_thu_cung'] ?></td>
						</tr>
						<tr>
							<td>Tổng số loại thú cưng</td>
							<td><?php echo $each_loai_san_pham['tong_so_loai_cho'] ?>( giống chó ) <?php echo $each_loai_san_pham['tong_so_loai_meo'] ?>(giống mèo ) </td>
						</tr>
						<tr>
							<td>Tổng số thú cưng theo loại</td>
							<td>
								<table>
									<tr id="ROW1">
										<td style="width: 50%">Tên loại thú cưng</td>
										<td>Số lượng</td>
									</tr>
									<?php foreach ($result_sp_theo_loai as $each_sp_theo_loai) { ?>
										<tr>
											<td>
												<?php echo $each_sp_theo_loai['ten'] ?>
											</td>
											<td>
												<?php echo $each_sp_theo_loai['tong_thu_cung'] ?> (con)
											</td>
										</tr>
									<?php } ?>
								</table>
							</td>
						</tr>
						<tr>
							<td>Thú cưng có giá cao nhất</td>
							<td>
								<table>
									<tr id="ROW1"><td style="width: 50%">Tên thú cưng : </td><td>Giá bán :</td></tr>
									<?php foreach ($result_sp_max as $each_sp_max) { ?>
										<tr>
											<td><?php echo $each_sp_max['ten'] ?></td>
											<td><?php echo number_format($each_sp_max['gia_ban']) ?> VNĐ</td>
										</tr>
									<?php } ?>
								</table>
							</td>
						</tr>
						<tr>
							<td>Thú cưng <br> có giá thấp nhất</td>
							<td>
								<table>
									<tr id="ROW1"><td style="width: 50%">Tên thú cưng : </td><td>Giá bán :</td></tr>
									<?php foreach ($result_sp_min as $each_sp_min) { ?>
										<tr>
											<td><?php echo $each_sp_min['ten'] ?></td>
											<td><?php echo number_format($each_sp_min['gia_ban']) ?> VNĐ</td>
										</tr>
									<?php } ?>
								</table>
							</td>
						</tr>
						<tr>
							<td>Tổng số thú cưng đã bán </td>
							<td>Tháng này : <?php echo $each_sp['da_ban_thang_nay'] ?> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Tháng trước :<?php echo $each_sp['da_ban_thang_truoc'] ?></td>
						</tr>
					</table>
				</div>
				<button></button>
			</div>
		</div>
	</div>
	<?php include('footer_admin.php') ?>
	<script type="text/javascript" src="../../include/JS/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../../include/JS/menu.js"></script>
</body>
</html>