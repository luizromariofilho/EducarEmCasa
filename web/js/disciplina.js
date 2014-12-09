function list(){
	$("table tr").innerHtml("<td>1</td><td>BD 1</td><td>60 horas</td><td>Hélio Lopes</td><td><i class='fa fa-pencil></i>Editar'</td>");
}

function salvar(){
	var form = $("form");
	var fields = form.serialize();
	$.post("/EducarEmCasa/classes/disciplina/salvar.php", fields, function(data){
		eval(data);
		alert(data)
		if(data == 1){
			$(location).attr('href','web/pages/main.html');
		} else {
			$("#error").show();
		}
	});
}