function carregarPagina(name){
	if(name == undefined || name == '' || name == null){
		$("#content").load("dashboard.html");
	} else{
		$("#content").load(name + ".html");
	}
}