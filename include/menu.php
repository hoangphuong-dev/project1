<?php
include 'Admin/common/connect.php';
$sql_cho = "select * from loai_thu_cung
where ten like 'Cho%'";
$result_cho = mysqli_query($connect,$sql_cho);
$sql_meo = "select * from loai_thu_cung
where ten like 'Meo%'";
$result_meo = mysqli_query($connect,$sql_meo);
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="div_menu">
	<div class="div_giua" style="width: 90%; margin: auto; float: none;">
		<div class="div_trai" style="width: 10%; float: left;">
			<div class="div_home">
				<a href="../doAn1/">
					<i class="fa fa-home fa-2x"></i>
				</a>
			</div>
		</div>
		<div class="div_phai" style="width: 90%; float: left;">
			<ul class="ul_1">
				<li class="menu">
					<a href="../doAn1/" data-hover="TRANG CHỦ">TRANG CHỦ</a>
				</li>
				<li class="menu">
					<a href="gioi_thieu.php" data-hover="GIỚI THIỆU">GIỚI THIỆU</a>
				</li>
				<li class="menu">
					<a data-hover="CHÓ CẢNH &#9662">CHÓ CẢNH &#9662</a>
					<div class="khoi_menu">
						<ul class="ul_2">
							<?php foreach($result_cho as $each) {?>
								<li class="li_2">
									<a href="?ma_loai_thu_cung=<?php echo $each['ma']?>"><?php echo $each['ten']?></a>
								</li>
							<?php }?>
							<div class="khoi_nho"></div>
						</ul>
					</div>
				</li>
				<li class="menu">
					<a href="#"  data-hover="MÈO CẢNH &#9662">MÈO CẢNH &#9662</a>
					<div class="khoi_menu">
						<ul class="ul_2">
							<?php foreach ($result_meo as $each) { ?>
								<li class="li_2">
									<a href="?ma_loai_thu_cung=<?php echo $each['ma'] ?>"><?php echo $each['ten']?></a>
								</li>
							<?php } ?>
							<div class="khoi_nho"></div>
						</ul>
					</div>
				</li>
				<li class="menu">
					<a href="lien_he.php" data-hover="LIÊN HỆ">LIÊN HỆ</a>
				</li>
			</ul>
		</div>
	</div>
</div>