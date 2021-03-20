<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<?php 
include('Admin/common/connect.php');
$sql = "select * from footer";
$result = mysqli_query($connect, $sql);
$each = mysqli_fetch_array($result);
?>
<div class="div_footer">
	<div class="div_giua" style="float: none; margin: auto; width: 90%;">
		<hr style="color: white; margin-top: 5px;">
		<div class="div_lien_he">
			<h3>THÔNG TIN LIÊN HỆ</h3>
			<ul class="contact-list">
				<li class="list-item">
					<i class="fa fa-map-marker fa-2x">
						<span class="lien_he place"><?php echo $each['dia_chi'] ?></span>
					</i>
				</li>
				<li class="list-item">
					<i class="fa fa-phone fa-2x">
						<span class="lien_he phone"><a href="tel:(+84) 968385320" title="Give me a call"><?php echo $each['sdt'] ?></a></span>
					</i>
				</li>
				<li class="list-item">
					<i class="fa fa-envelope fa-2x">
						<span class="lien_he gmail"><a href="mailto:#" title="Send me an email"><?php echo $each['email'] ?></a></span>
					</i>
				</li>
			</ul>
		</div>
		<div class="div_gioi_thieu" style="padding-left: 13%">
			<h3>LIÊN KẾT</h3>
			<ul class="ul_lien_ket">
				<li>
					<a href="<?php echo $each['link_facebook'] ?>" target="_blank">
						<i class="fa fa-facebook-square fa-2x" style="color: #0E8DF1"></i>
						<span class="span_icon">Facebook</span>
					</a>
				</li>
				<li>
					<a href="<?php echo $each['link_youtube'] ?>" target="_blank">
						<i class="fa fa-youtube-play fa-2x" style="color: #FF0000"></i>
						<span class="span_icon " style="padding-left: 18px">Youtube</span>
					</a>
				</li>
				<li>
					<a href="<?php echo $each['link_twitter'] ?>" target="_blank">
						<i class="fa fa-twitter-square fa-2x" style="color: #1DA1F2"></i>
						<span class="span_icon">Twitter</span>
					</a>
				</li>
			</ul>
		</div>
		<div class="div_khach_hang" style="padding-left: 12%">
			<h3>HỖ TRỢ KHÁCH HÀNG </h3>
			<li><a>Hướng dẫn mua hàng</a></li>
			<li><a>Chất lượng lịch vụ</a></li>
		</div>
	</div>
</div>
<?php mysqli_close($connect); ?>
