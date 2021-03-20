
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<?php 
include('Admin/common/connect.php');
$thu_muc_anh = 'image/';
$sql_anh_logo = "select * from anh where ma = 1";
$result_logo = mysqli_query($connect, $sql_anh_logo);
$each_logo = mysqli_fetch_array($result_logo);
?>
<body <?php if(isset($_GET['error']) || isset($_GET['success'])){ echo "onload='stay_open()'"; } ?>>
	<div class="div_header" style="width: 90%; margin: auto;">
		<div class="div_logo">
			<a href="../doAn1/"><img width="60%" height="100%" src="<?php echo $thu_muc_anh . $each_logo['ten_ma_hoa'] ?>" alt="đây là logo"></a>
		</div>
		<div class="div_tim_kiem">
			<form action="../doAn1/">
				<input type="search" placeholder="Tên thú cưng , loại thú cưng.." name="tim_kiem">
				<?php if(isset($_GET['ma_loai_thu_cung'])) { ?>
					<input type="hidden" name="ma_loai_thu_cung" value="<?php echo $_GET['ma_loai_thu_cung'] ?>">
				<?php } ?>
				<button type="submit">
					<i class="fa fa-search"></i>
				</button>
			</form>
		</div>
		<div class="div_gio_hang">
			<div class="div_tron">
				<?php if(isset($_SESSION['ma'])) { ?>
					<a href="xem_gio_hang.php">
						<i class="fas fa-shopping-cart" style="cursor: pointer"></i>
					</a>
				<?php }  else { ?> 
					<i class="fas fa-shopping-cart" style="cursor: pointer"onclick="document.getElementById('id_dang_nhap').style.display='block'"></i>
				<?php } ?>
			</div>
		</div>
		<div class="div_dang_nhap">
			<?php if(!isset($_SESSION['ma'])) { ?>
				<button onclick="open_login()"style="cursor: pointer">ĐĂNG NHẬP</button>
				<div id="id_dang_nhap" class="div_form">
					<form class="form" action="user/proces_dang_nhap.php" method="post">
						<div class="div_thong_tin_dang_nhap">

							<!-- nếu đăng nhập không hợp lệ thì in ra lỗi trên div_đăng nhâp -->
							<?php if(isset($_GET['error'])) { ?>
								<p class="thong_bao">*<?php echo $_GET['error']; ?></p>
							<?php } ?>
							<!-- nếu đăng ký thành công thì hiện thông báo và yêu cầu người dùng đăng nhập -->
							<?php if(isset($_GET['success'])) { ?>
								<p class="thong_bao" style="font-size: 20px"><?php echo $_GET['success']; ?></p>
							<?php } ?>
							<table width="100%">
								<tr>
									<td colspan="2"><h1 style="text-align: center; margin-top: 30px;">ĐĂNG NHẬP</h1></td>
								</tr>
								<tr>
									<td style="width: 20%"><span class="in_dam">Email :</span></td>
									<td style="width: 80%"><input type="email" placeholder="Nhập email " name="email"></td>
								</tr>
								<tr>
									<td><span class="in_dam">Mật khẩu : </span></td>
									<td><input type="password" placeholder="Nhập mật khẩu" name="mat_khau"></td>
								</tr>
								<tr>
									<td colspan="2" style="text-align: center"><button class="dang_nhap" type="submit">Đăng nhập</button> </td>
								</tr>
								<tr>
									<td colspan="2" style="text-align: center">
										<span class="in_dam">Bạn là khách hàng mới?</span><a class="chu_do" href="dang_ky.php">Đăng kí ngay</a>
									</td>
								</tr>
							</table>
						</div>
					</form>
				</div>
			<?php }  else { ?> 
				<div class="ho_ten">
					<span>
						<?php echo $_SESSION['ten'] ?>
					</span>
				</div>
				<div class="icon">
					<ul>
						<li>
							<i class='fas fa-user-circle'></i>
							<ul>
								<div class="setting" style="width: 180px; height: 250px; border-radius: 10px;background: white; border: 2px solid #EFF6E0; z-index: 543" >
									<li>
										<a href="thong_tin_nguoi_dung.php">Tài khoản của tôi </a>
									</li>
									<li>
										<a href="xem_hoa_don.php">Đơn hàng của tôi</a>
									</li>
									<li>
										<a href="user/proces_dang_xuat.php">
											Đăng xuất
										</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			<?php } ?>
		</div>
	</div>
	<script>
		var modal = document.getElementById('id_dang_nhap');
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}
	</script>
	<script type="text/javascript" src="include/JS/bookup.js"></script>