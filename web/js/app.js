function carregarPagina(name, data){
	if(isNull(name)){
		$("#content").load("dashboard.html");
	} else{
		if(isNull(data)){
			$("#content").load(name + ".html");
			list();
		}else{
			$("#content").load(name + ".html");
			edit(data);
		}
	}
}

function isNull(value){
	return value == undefined || value == '' || value == null;
}