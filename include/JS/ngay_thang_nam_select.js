function thay_doi_ngay_lon_nhat() {
	let thang =parseInt(document.getElementById('select_thang').value);
	let ngay = 31;
	switch (thang) {
		// defaut để kiểm tra tháng mình nhập không nhảy vào switch nào 
		// default : 
		// 	alert(1);
		// 	break;
		case 4:
		case 6:
		case 9:
		case 11:
		ngay = 30;
		break;
		case 2 :
		let nam = parseInt(document.getElementById('select_nam').value);
		if(nam % 4 == 0) {
			ngay = 29;
		}
		else {
			ngay = 28;
		}
		break;
	}
	let chuoi_ngay = '';
	for(let i = 1; i <= ngay; i++) {
		chuoi_ngay += '<option>' + i + '</option>';
	}
	document.getElementById('select_ngay').innerHTML = chuoi_ngay;
}
