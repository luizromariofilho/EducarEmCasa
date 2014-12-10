function login(){
	var form = $("form");
	var fields = form.serialize();
	$.post("classes/utils/login.php", fields, function(data){
		switch(data){
			case 1 :
				$(location).attr('href','web/pages/main.html');
				break;
			case 2 :
				alert('professor');
				break;
			default:
				$("#error").show();
		}
	});
}