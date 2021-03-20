<?php
include('../common/connect.php');
if(!empty($_POST['dia_chi']) && !empty($_POST['sdt']) && !empty($_POST['email']) && !empty($_POST['link_facebook']) && !empty($_POST['link_youtube'])&& !empty($_POST['link_twitter'])) {
	$dia_chi =trim($_POST['dia_chi']);
	$sdt =trim($_POST['sdt']);
	$email =trim($_POST['email']);
	$link_facebook =trim($_POST['link_facebook']);
	$link_youtube =trim($_POST['link_youtube']);
	$link_twitter =trim($_POST['link_twitter']);
	$sql = "update footer set 
	dia_chi = '$dia_chi',
	sdt = '$sdt',
	email = '$email',
	link_facebook = '$link_facebook',
	link_youtube = '$link_youtube',
	link_twitter = '$link_twitter'";
	mysqli_query($connect,$sql);
	echo "<script> window.location.replace('../chinh_sua_footer/'); alert('Đã cập nhật thông tin !');</script>";
	exit();
} else header("location:../common/loi.php");
mysqli_close($connect);


