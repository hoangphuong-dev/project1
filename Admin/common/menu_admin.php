<style type="text/css" media="screen">
	.ul_1 >.menu > a:first-child{
		padding: 14px 35px;
	}
	.ul_1 a:before {
		left: 35px;
	}
	.ul_1 a:hover:before,
	.ul_1 a:hover:after{
		width: 64%;
	}
</style>
<div class="div_menu">
	<div class="div_giua admin" style="width: 90%; margin: auto; float: none;white-space: nowrap;">
		<div class="div_trai">
			<div class="div_home">
				<a href="../common/trang_chu_admin.php">
					<i class="fa fa-home" style="font-size:30px;color:black"></i>
				</a>
			</div>
		</div> 
		<div class="div_phai">
			<ul class="ul_1">
				<li class="menu"><a href="../common/trang_chu_admin.php" data-hover="TRANG CHỦ">TRANG CHỦ</a></li>
				<li class="menu"><a href="../quan_ly_khach_hang/" data-hover="KHÁCH HÀNG &#9662">KHÁCH HÀNG</a></li>
				<li class="menu"><a href="../quan_ly_hoa_don/" data-hover="HOÁ ĐƠN">HOÁ ĐƠN</a></li>
				<li class="menu">
					<a href="" data-hover="THÚ CƯNG &#9662">THÚ CƯNG &#9662</a>
					<div class="khoi_menu">
						<ul class="ul_2">
							<li class="li_2"><a href="../quan_ly_thu_cung/">Tất cả thú cưng</a></li>
							<li class="li_2"><a href="../quan_ly_thu_cung/insert_thu_cung.php?action=1">Thêm thú cưng</a></li>
							<div class="khoi_nho"></div>
						</ul>
					</div>
				</li>
				<?php if($_SESSION['cap_do'] == 1) { ?>
					<li class="menu">
						<a href=""  data-hover="ADMIN &#9662">ADMIN &#9662</a>
						<div class="khoi_menu">
							<ul class="ul_2">
								<li class="li_2"><a href="../quan_ly_admin/">Tất cả admin</a></li>
								<li class="li_2"><a href="../quan_ly_admin/insert_admin.php?action=1">Thêm admin</a></li>
								<div class="khoi_nho"></div>
							</ul>
						</div>
					</li>
				<?php } ?>
				<li class="menu">
					<a href="../quan_ly_anh/"  data-hover="ĐỔI ẢNH &#9662">ĐỔI ẢNH &#9662</a>
					<div class="khoi_menu">
						<ul class="ul_2">
							<li class="li_2"><a href="../quan_ly_anh/update_anh.php?ma=1">Logo</a></li>
							<li class="li_2"><a href="../quan_ly_anh/update_anh.php?ma=2">Header_admin</a></li>
							<li class="li_2"><a href="../quan_ly_anh/update_anh.php?ma=4">Banner_user_1</a></li>
							<li class="li_2"><a href="../quan_ly_anh/update_anh.php?ma=5">Banner_user_2</a></li>
							<li class="li_2"><a href="../quan_ly_anh/update_anh.php?ma=6">Banner_user_3</a></li>
							<div class="khoi_nho"></div>
						</ul>
					</div>
				</li>
			</ul>
		</div>
		<div class="div_mo_rong">
			<i class="fa fa-navicon" onclick="document.getElementById('id_setting').style.display='block'" style="font-size:30px;cursor: pointer;"></i>
			<div class="div_chao">
				<div id="id_setting" class="div_nen">
					<div class="div_dang_xuat">
						<ul>
							<?php if($_SESSION['cap_do'] == 0) { ?>
								<li><a href="../quan_ly_tai_khoan/"><i class='fa fa-user-circle-o'></i>Tài khoản của tôi</a></li>
							<?php } ?>
							<?php if($_SESSION['cap_do'] == 1) { ?>
								<li><a href="../quan_ly_loai_thu_cung/"><i class="fas fa-tasks"></i>Quản lý loại thú cưng</a></li>
								<li><a href="../quan_ly_nguon_goc/"><i class="fas fa-tasks"></i>Nguồn gốc thú cưng</a></li>
								<li><a href="../quan_ly_mau_long/"><i class="fas fa-tasks"></i>Quản lý màu lông</a></li>
								<li><a href="../quan_ly_trang_gioi_thieu/"><i><img src="../../image/edit.png" width="30" height="30"/></i>Sửa trang giới thiệu</a></li>
								<li><a href="../chinh_sua_footer/"><i><img src="../../image/edit.png" width="30" height="30"/></i>Sửa footer</a></li>
							<?php } ?>
							<li><a href="../common/dang_xuat.php"><i class="fa fa-sign-out"></i>Đăng xuất</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	var modal = document.getElementById('id_setting');
	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
</script>
