var obj;
function carregarPagina(name, data){
	if(isNull(name)){
		$("#content").load("dashboard.html");
		loadDashboard();
	} else{
		$("#content").load(name + ".html");
		var entidade = name.substring(0, name.indexOf("/"));
		switch (entidade){
			case "disciplina":
				obj = new Disciplina();
				break;
			case "aluno":
				obj = new Aluno();
				obj.init();
				break;
			case "usuario":
				obj = new Usuario();
				break;
			case "semestre":
				obj = new Semestre();
				break;
			case "turma":
				obj = new Turma();
				obj.init();
				break;
		}
		if(isNull(data)){
			obj.list();
		}else{
			obj.edit(data);
		}
	}
}

function isNull(value){
	return value == undefined || value == '' || value == null;
}

function loadDashboard(){
	$.get("/EducarEmCasa/classes/aluno/cont.php", function(data){
		var json = $.parseJSON(data);
		var qt = json[0].count;
		$("#qtAlunos").append(qt);
	});
	$.get("/EducarEmCasa/classes/disciplina/cont.php", function(data){
		var json = $.parseJSON(data);
		var qt = json[0].count;
		$("#qtDisciplinas").append(qt);
	});
	$.get("/EducarEmCasa/classes/usuario/cont.php", function(data){
		var json = $.parseJSON(data);
		var qt = json[0].count;
		$("#qtProfessores").append(qt);
	});
}