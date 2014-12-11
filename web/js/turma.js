function Turma (){
	this.init = function () {
		$.get("/EducarEmCasa/classes/aluno/listar.php", function(data){
			var obj = $.parseJSON(data);
			var linhas = '';
			for (var i = 0; i < obj.length; i++) {
				var linha = '<option value="'+ obj[i].id+'">'+ obj[i].nome+'</option>';
				linhas += linha;
			};
			$("#aluno").append(linhas);
		});
		$.get("/EducarEmCasa/classes/disciplina/listar.php", function(data){
			var obj = $.parseJSON(data);
			var linhas = '';
			for (var i = 0; i < obj.length; i++) {
				var linha = '<option value="'+ obj[i].id+'">'+ obj[i].nome+'</option>';
				linhas += linha;
			};
			$("#disciplina").append(linhas);
		});
		$.get("/EducarEmCasa/classes/semestre/listar.php", function(data){
			var obj = $.parseJSON(data);
			var linhas = '';
			for (var i = 0; i < obj.length; i++) {
				var linha = '<option value="'+ obj[i].id+'">'+ obj[i].valor+'</option>';
				linhas += linha;
			};
			$("#semestre").append(linhas);
		});
	}

	this.list = function(){
		$.get("/EducarEmCasa/classes/turma/listar.php", function(data){
			var obj = $.parseJSON(data);
			var linhas = '';
			for (var i = 0; i < obj.length; i++) {
				var linha = '<tr><td>'+ obj[i].aluno_nome+'</td><td>'+ obj[i].disciplina_nome+'</td><td>'
							+ obj[i].semestre_valor+'</td><td><a onclick="carregarPagina(\'turma/form\', '+ obj[i].id+')"><i class="fa fa-fw fa-pencil"></i></a>&nbsp;<a onclick=""><i class="fa fa-fw fa-close"></i></a></td></tr>';
				linhas += linha;
			};
			$("table tr").after(linhas);
		});

	}

	this.salvar = function(){
		var form = $("form");
		var fields = form.serialize();
		$.post("/EducarEmCasa/classes/turma/salvar.php", fields, function(data){
			eval(data);
			if(data == 1){
				carregarPagina('turma/list');
			} else {
				$("#error").show();
			}
		});
	}

	this.edit = function (id){
		$.get("/EducarEmCasa/classes/turma/editar.php", {"id" : id}, function(data){
			var obj = $.parseJSON(data);
			$('form').loadJSON(obj);
		});
	}

	this.excluir = function () {
		var id = $("input[name='id']").val();
		$.post("/EducarEmCasa/classes/turma/excluir.php", {"id" : id}, function(data){
			eval(data);
			if(data == 1){
				carregarPagina('turma/list');
			} else {
				$("#error").show();
			}
		});
	}
}