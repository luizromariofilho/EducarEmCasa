var obj;
function carregarPagina(){
	init();
}

function init () {
	$.get("/EducarEmCasa/classes/turma/listar.php", function(data){
		var obj = $.parseJSON(data);
		var linhas = '';
		for (var i = 0; i < obj.length; i++) {
			var linha = '<option value="'+ obj[i].id+'">'+ obj[i].aluno_nome + ' - ' + obj[i].semestre_valor + ' - ' + obj[i].disciplina_nome + '</option>';
			linhas += linha;
		};
		$("select").append(linhas);
	});
}

function salvar(){
	var form = $("form");
	var fields = form.serialize();
	$.post("/EducarEmCasa/classes/turma/lancar-notas.php", fields, function(data){
		eval(data);
		if(data == 1){
			$("#ok").show();
			$("#not").hide();
		} else {
			$("#ok").hide();
			$("#not").show();
		}
	});
}