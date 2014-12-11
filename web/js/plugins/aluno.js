function Aluno (){
	this.list = function(){
		$.get("/EducarEmCasa/classes/aluno/listar.php", function(data){
			var obj = $.parseJSON(data);
			var linhas = '';
			for (var i = 0; i < obj.length; i++) {
				var linha = '<tr><td>'+ obj[i].codigo+'</td><td>'+ obj[i].nome+'</td><td>'
							+ obj[i].carga_horaria+'</td><td><a onclick="carregarPagina(\'aluno/form\', '+ obj[i].id+')"><i class="fa fa-fw fa-pencil"></i></a>&nbsp;<a onclick=""><i class="fa fa-fw fa-close"></i></a></td></tr>';
				linhas += linha;
			};
			$("table tr").after(linhas);
		});

	}

	this.salvar = function(){
		var form = $("form");
		var fields = form.serialize();
		$.post("/EducarEmCasa/classes/aluno/salvar.php", fields, function(data){
			eval(data);
			if(data == 1){
				carregarPagina('aluno/list');
			} else {
				$("#error").show();
			}
		});
	}

	this.edit = function (id){
		$.get("/EducarEmCasa/classes/aluno/editar.php", {"id" : id}, function(data){
			var obj = $.parseJSON(data);
			$('form').loadJSON(obj);

		});
	}

	this.excluir = function () {
		var id = $("input[name='id']").val();
		$.post("/EducarEmCasa/classes/aluno/excluir.php", {"id" : id}, function(data){
			eval(data);
			if(data == 1){
				carregarPagina('aluno/list');
			} else {
				$("#error").show();
			}
		});
	}
}