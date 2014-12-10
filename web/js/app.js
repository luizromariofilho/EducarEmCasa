var obj;
function carregarPagina(name, data){
	if(isNull(name)){
		$("#content").load("dashboard.html");
	} else{
		$("#content").load(name + ".html");
		var entidade = name.substring(0, name.indexOf("/"));
		switch (entidade){
			case "disciplina":
				obj = new Disciplina();
				break;
			case "aluno":
				obj = new Aluno();
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