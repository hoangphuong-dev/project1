
<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập Admin</title>
	<link rel="stylesheet" href="../CSS/index_login_admin.css">
</head>
<body>
	<div class="div_dang_nhap">
		<?php if(isset($_GET['error'])) { ?>
			<h4 style="text-align: center; color: red; opacity: 0.8">
				<?php echo $_GET['error'] ?>
			</h4>
		<?php } ?>
		<form action="process_login.php" method="post">
			<h1>Đăng nhập hệ thống</h1>
			<input placeholder="Email đăng nhập" type="email" name="email"> <br>
			<input placeholder="Mật khẩu đăng nhập" type="password" name="mat_khau">
			<button class="dang_nhap">Đăng nhập</button>
		</form>
	</div>
</body>
</html>