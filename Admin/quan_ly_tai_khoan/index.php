<?php include('../check_admin.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản lý tài khoản</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../CSS/admin.css">
	<link rel="stylesheet" href="../../CSS/user.css">
</head>
<body>
	<div class="div_tong" >
		<?php 
		$ma = $_SESSION['ma_admin'];
		require '../common/connect.php';
		$sql = "select * from admin where ma = $ma";
		$result = mysqli_query($connect, $sql);
		$each = mysqli_fetch_array($result);

		?>
		<?php include('../common/header_admin.php') ?>
		<?php include('../common/menu_admin.php') ?>
		<div class="div_content" style="height: 900px">
			<div class="div_le_trai"></div>
			<div class="kh" style="background-position: center center;background-size: cover;background-attachment: fixed;opacity: 0.9;margin-top: 4px;width: 80%;height: 100%;float: left;">
				<button class="quay_lai" onclick="window.history.back();">
					<i class="fa fa-reply"></i>Quay lại
				</button>
				<form action="process.php" method="post" style="width: 70%; margin: auto; height: 70%; background: #FAC15D; margin-top: 8%; padding-top: 20px; border-radius: 10px">
					<h2 style="text-align: center;margin-bottom: 50px;">Chỉnh sửa chi tiết</h2>
					<?php if(isset($_GET['error'])) { ?>
						<p style="color: red; opacity: 0.8;text-align: center;">
							(<?php echo $_GET['error'] ?>)
						</p>
					<?php } ?>
					<input type="hidden" name="ma" value="<?php echo $ma ;?>">
					<table style="width: 90%; margin:auto;">
						<tr>
							<td style="width: 20%"><span class="in_dam">Họ tên :</span></td>
							<td style="width: 80%"><input type="text" name="ten" value=" <?php echo $each['ten'] ?> "></td>
						</tr>
						<tr>
							<td><span class="in_dam">Số chứng minh :</span></td>
							<td><input type="text" name="cmnd" value=" <?php echo $each['cmnd'] ?>"></td>
						</tr>
						<tr>
							<td><span class="in_dam">Số điện thoại :</span></td>
							<td><input type="text" name="sdt" value=" <?php echo $each['sdt'] ?>"></td>
						</tr>
						<tr>
							<td><span class="in_dam">Email :</span></td>
							<td><input type="email" name="email" value="<?php echo $each['email'] ?>"></td>
						</tr>
						<tr>
							<td><span class="in_dam">Mật khẩu :</span></td>
							<td><input type="text" name="mat_khau" value="<?php echo $each['mat_khau'] ?>"></td>
						</tr>
						<tr>
							<td colspan="2" style="text-align: center"><button style="font-size: 20px;padding: 8px;border-radius: 5px; border: 1px solid #EFF6E0; margin-top: 50px; width: 30%; cursor: pointer; background: lightgreen " class="dang_ky" type="submit">Lưu thông tin</button></td>
						</tr>
					</table>
				</form>
			</div> <!-- kết thúc div_all_table -->
			<?php mysqli_close($connect) ?>
			<div class="div_le_phai"></div>
		</div>
		<?php include('../common/footer_admin.php') ?>
		<script type="text/javascript" src="../../include/JS/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="../../include/JS/menu.js"></script>
	</body>
	</html>