// hàm kiểm tra tiếng việt
function removeAscent (str) {
	if (str === null || str === undefined) return str;
	str = str.toLowerCase();
	str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
	str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
	str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
	str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
	str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
	str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
	str = str.replace(/đ/g, "d");
	return str;
}

// validate tất cả các form người dùng nhập vào 
function validate_form() {
	// validate họ tên 
	let ho_ten=document.getElementById('input_ho_ten').value;
	let check_error = false;
	let regex_ho_ten = /^[a-zA-Z ]{2,30}$/;
	if(ho_ten.length == 0) {
		document.getElementById('error_ho_ten').innerHTML='* Tên không được trống !';
		check_error= true;
	} 
	else {
		if(regex_ho_ten.test(removeAscent(ho_ten))){
			document.getElementById('error_ho_ten').innerHTML='';
		}else{
			document.getElementById('error_ho_ten').innerHTML='* Chỉ nhập chữ cái và khoảng trắng !';
			check_error= true;
		}
	}
	// validate email
	let email=document.getElementById('input_email').value;
	if(email.length == 0) {
		document.getElementById('error_email').innerHTML='* Email không được để trống !';
		check_error= true;
	} 
	else {
		let regex_email = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		if(regex_email.test(email)){
			document.getElementById('error_email').innerHTML='';
		}else{
			document.getElementById('error_email').innerHTML='* Định dạng email không hợp lệ !';
			check_error= true;
		}
	}
	// validate sdt
	let sdt=document.getElementById('input_sdt').value;
	if(sdt.length == 0){
		document.getElementById('error_sdt').innerHTML='* Sđt không được để trống !';
		check_error= true;
	} 
	let regex_sdt = /(84|0[3|5|7|8|9])+([0-9]{8})\b/;
	if(regex_sdt.test(sdt)){
		document.getElementById('error_sdt').innerHTML='';
	}else{
		document.getElementById('error_sdt').innerHTML='* Định dạng số điện thoại không hợp lệ !';
		check_error= true;
	}
	// validate password 
	let mat_khau = document.getElementById('input_mat_khau').value;
	let regex_mat_khau =/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{3,20}$/;
	if(mat_khau.length == 0) {
		document.getElementById('error_mat_khau').innerHTML='* Mật khẩu không được để trống !';
		check_error = true;
	} 
	if(regex_mat_khau.test(mat_khau)) {
		document.getElementById('error_mat_khau').innerHTML='';
	} else {
		document.getElementById('error_mat_khau').innerHTML='* Mật khẩu phải trên 3 kí tự và không có kí tự đặc biệt !';
		check_error = true;
	}
	// validate nhập lại mật khẩu
	// let lai_mat_khau = document.getElementById('input_lai_mat_khau').value;
	// if(mat_khau != lai_mat_khau) {
	// 	document.getElementById('error_lai_mat_khau').innerHTML='Xin lỗi ! Mật khẩu chưa khớp .';
	// 	check_error= true;
	// } else {
	// 	document.getElementById('error_lai_mat_khau').innerHTML='';
	// }
	// validate địa chỉ 
	// let dia_chi=document.getElementById('input_dia_chi').value;
	// let regex_dia_chi= /^[a-zA-Z ]{2,30}$/;
	// if(regex_dia_chi.test(removeAscent(dia_chi))){
	// 	document.getElementById('error_dia_chi').innerHTML='';
	// }else{
	// 	document.getElementById('error_dia_chi').innerHTML='Xin lỗi ! Bạn nhập sai địa chỉ .';
	// 	check_error= true;
	// }

	// validate cmnd
	// let cmnd=document.getElementById('input_cmnd').value;
	// if(cmnd.length == 13) {
	// 	document.getElementById('error_cmnd').innerHTML='';
	// }
	// else{
	// 	document.getElementById('error_cmnd').innerHTML='* ';
	// 	check_error= true;
	// }
	if(check_error) {
		return false;
	}
}
