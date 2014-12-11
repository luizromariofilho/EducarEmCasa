function Usuario (){
	this.list = function(){
		$.get("/EducarEmCasa/classes/usuario/listar.php", function(data){
			var obj = $.parseJSON(data);
			var linhas = '';
			for (var i = 0; i < obj.length; i++) {
				var linha = '<tr><td>'+ obj[i].nome+'</td><td>'+ obj[i].login+'</td><td>'
							+ obj[i].regra+'</td><td><a onclick="carregarPagina(\'usuario/form\', '+ obj[i].id+')"><i class="fa fa-fw fa-pencil"></i></a>&nbsp;<a onclick=""><i class="fa fa-fw fa-close"></i></a></td></tr>';
				linhas += linha;
			};
			$("table tr").after(linhas);
		});

	}

	this.salvar = function(){
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

	this.edit = function (id){
		$.get("/EducarEmCasa/classes/usuario/editar.php", {"id" : id}, function(data){
			var obj = $.parseJSON(data);
			$('form').loadJSON(obj);
		});
	}

	this.excluir = function () {
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
}