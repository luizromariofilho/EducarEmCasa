function list(){
	$.get("/EducarEmCasa/classes/disciplina/listar.php", function(data){
		var obj = $.parseJSON(data);
		var linhas = '';
		for (var i = 0; i < obj.length; i++) {
			var linha = '<tr><td>'+ obj[i].codigo+'</td><td>'+ obj[i].nome+'</td><td>'+ obj[i].carga_horaria+'</td><td></td></tr>';
			linhas += linha;
		};
		$("table tr").after(linhas);
	});

}

function salvar(){
	var form = $("form");
	var fields = form.serialize();
	$.post("/EducarEmCasa/classes/disciplina/salvar.php", fields, function(data){
		eval(data);
		if(data == 1){
			carregarPagina('disciplina/list');
		} else {
			$("#error").show();
		}
	});
}