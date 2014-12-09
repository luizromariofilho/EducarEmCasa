function login(){
	var form = $("form");
	var fields = form.serialize();
	$.post("classes/utils/login.php", fields, function(data){
		eval(data);
		if(data == 1){
			$(location).attr('href','web/pages/main.html');
		} else {
			$("#error").show();
		}
	});
}