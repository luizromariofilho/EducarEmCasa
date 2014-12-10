function list(){
	$.get("/EducarEmCasa/classes/usuario/listar.php", function(data){
		var obj = $.parseJSON(data);
		var linhas = '';
		for (var i = 0; i < obj.length; i++) {
			var linha = '<tr><td>'+ obj[i].codigo+'</td><td>'+ obj[i].nome+'</td><td>'
						+ obj[i].carga_horaria+'</td><td><a onclick="carregarPagina(\'usuario/form\', '+ obj[i].id+')"><i class="fa fa-fw fa-pencil"></i></a>&nbsp;<a onclick=""><i class="fa fa-fw fa-close"></i></a></td></tr>';
			linhas += linha;
		};
		$("table tr").after(linhas);
	});

}

function salvar(){
	var form = $("form");
	var fields = form.serialize();
	$.post("/EducarEmCasa/classes/usuario/salvar.php", fields, function(data){
		eval(data);
		if(data == 1){
			carregarPagina('usuario/list');
		} else {
			$("#error").show();
		}
	});
}

function edit(id){
	$.get("/EducarEmCasa/classes/usuario/editar.php", {"id" : id}, function(data){
		var obj = $.parseJSON(data);
		$('form').loadJSON(obj);

	});
}

function excluir () {
	var id = $("input[name='id']").val();
	$.post("/EducarEmCasa/classes/usuario/excluir.php", {"id" : id}, function(data){
		eval(data);
		if(data == 1){
			carregarPagina('usuario/list');
		} else {
			$("#error").show();
		}
	});
}