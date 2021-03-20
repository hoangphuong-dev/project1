function open_login(){
	var login_screen = document.getElementById('id_dang_nhap');
	if(login_screen.style.display == "block"){
		login_screen.style.display = "none";
	}
	else{
		login_screen.style.display = "block";
	}
}
function stay_open(){
	setTimeout(open_login(),10000000);
}