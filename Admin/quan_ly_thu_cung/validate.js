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
	// validate gia_ban
	let gia_ban=document.getElementById('input_gia_ban').value;
	if(gia_ban.length == 0){
		document.getElementById('error_gia_ban').innerHTML='* Giá bán không được để trống !';
		check_error= true;
	} 
	let regex_sdt = /[1-9][0-9]{4,20}/;
	if(regex_sdt.test(gia_ban)){
		document.getElementById('error_gia_ban').innerHTML='';
	}else{
		document.getElementById('error_gia_ban').innerHTML='* Giá bán chỉ được nhập số !';
		check_error= true;
	}
	// validate đặc điểm  
	let dac_diem = document.getElementById('input_dac_diem').value;
	if(dac_diem.length == 0) {
		document.getElementById('error_dac_diem').innerHTML='* Đặc điểm không được trống !';
		check_error= true;
	}
	// validate cách chăm sóc 
	let cham_soc=document.getElementById('input_cham_soc').value;
	if(cham_soc.length == 0) {
		document.getElementById('error_cham_soc').innerHTML='* Cách chăm sóc không được trống !';
		check_error= true;
	} 
	// validate gia_ban
	let can_nang_min=document.getElementById('input_can_nang_min').value;
	let regex_can_nang_min = /[1-9][0-9]{0,20}/;
	if(can_nang_min.length == 0) {
		document.getElementById('error_can_nang_min').innerHTML='* Cân nặng không được trống !';
		check_error= true;
	} 
	else {
		if(regex_can_nang_min.test(can_nang_min)) {
			document.getElementById('error_can_nang_min').innerHTML='';
		} else{
			document.getElementById('error_can_nang_min').innerHTML='* Cân nặng chỉ được nhập số !';
			check_error= true;
		}
	}
	// validate gia_ban
	let can_nang_max=document.getElementById('input_can_nang_max').value;
	let regex_can_nang_max = /[1-9][0-9]{0,20}/;
	if(can_nang_max.length == 0) {
		document.getElementById('error_can_nang_max').innerHTML='* Cân nặng không được trống !';
		check_error= true;
	} 
	else {
		if(regex_can_nang_max.test(can_nang_max)) {
			document.getElementById('error_can_nang_max').innerHTML='';
		} else{
			document.getElementById('error_can_nang_max').innerHTML='* Cân nặng chỉ được nhập số !';
			check_error= true;
		}
	}
	if(check_error == true) {
		return false;
	}
}