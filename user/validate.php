<?php 
$ten_loi = $email_loi = $dien_thoai_loi = $mat_khau_loi = $dia_chi_loi = "";
$ten = $email = $sdt = $mat_khau = $so_nha = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// validate tên
	if (empty($_POST["ten"])) $ten_loi = "* Tên không được trống !";
	else {
		$ten = input_data($_POST["ten"]);
		if (!preg_match("/^([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i",$ten)) $ten_loi = "* Chỉ nhập chữ cái và khoảng trắng !";
	}
		// validate email
	if (empty($_POST["email"])) $email_loi = "* Email không được trống !";
	else {
		$email = input_data($_POST["email"]);
		if (!preg_match("/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/",$email)) $email_loi = "* Định dạng email không hợp lệ !";
	}
		// validate sdt
	if (empty($_POST["sdt"])) $dien_thoai_loi = "* Sđt không được trống !";
	else {
		$sdt = input_data($_POST["sdt"]);
		if (!preg_match ("/(84|0[3|5|7|8|9])+([0-9]{8})\b/", $sdt) ) $dien_thoai_loi = "* Bạn phải nhập đúng định dạng !";
		if (strlen ($sdt) != 10) $dien_thoai_loi = "* Định dạng số điện thoại không hợp lệ !";
	}
		// validate giới tính
			// if (empty ($_POST["gioi_tinh"])) $gioi_tinh_loi = "* Giới tính không được trống !";
			// else $gioi_tinh = input_data($_POST["gioi_tinh"]);
		// validate mật khẩu
	if (empty($_POST["mat_khau"])) $mat_khau_loi = "* Mật khẩu không được trống !";
	else {
		$mat_khau = input_data($_POST["mat_khau"]);
		if (strlen ($mat_khau) < 6) $mat_khau_loi = "* Mật khẩu phải nhiều hơn 6 kí tự !";
	}
			// validate địa chỉ 
	if (empty($_POST["dia_chi"])) $dia_chi_loi = "* Địa chỉ không được trống !";
	else {
		$so_nha = input_data($_POST["dia_chi"]);
		if (!preg_match("/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i",$so_nha)) $dia_chi_loi = "* Không nhập kí tự đặc biệt !";
	}
}
function input_data($data) {  
	$data = trim($data);  
	$data = stripslashes($data);  
	$data = htmlspecialchars($data);  
	return $data;  
}