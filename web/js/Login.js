function login(){
	var form = $("form");
	var fields = form.serialize();
	$.post("classes/utils/login.php", fields, function(data){
		var obj = $.parseJSON(data);
		console.log(obj)
		switch(obj.permissao){
			case "1" :
				$(location).attr('href','web/pages/main.html');
				break;
			case "2" :
				alert('professor');
				break;
			case "3" :
				$(location).attr('href','web/pages/responsavel.html?id='+ obj.id);
				break;
			default:
				$("#error").show();
		}
	});
}