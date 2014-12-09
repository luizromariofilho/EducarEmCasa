function carregarPagina(name, data){
	if(isNull(name)){
		$("#content").load("dashboard.html");
	} else{
		if(isNull(data)){
			$("#content").load(name + ".html");
		}else{
			alert("ainda tem que fazer a parte de editar");
		}
	}
}

function isNull(value){
	return value == undefined || value == '' || value == null;
}