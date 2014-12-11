var obj;
function carregarPagina(){
	setId();
	loadFilhos();
}

function setId () {
	$("#id").val($.urlParam('id'));
}

$.urlParam = function(name){
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null){
       return null;
    }
    else{
       return results[1] || 0;
    }
}

function isNull(value){
	return value == undefined || value == '' || value == null;
}

function loadFilhos(){
	var id = $("#id").val();
	$.get("/EducarEmCasa/classes/aluno/buscar-por-pai.php",{"id" : id}, function(data) {
		var obj = $.parseJSON(data);
		var filhos = $("#filhos");
		$.each(obj, function(){
			filhos.append(
			'<div class="col-sm-4">' +
                '<div class="panel panel-primary">' +
                    '<div class="panel-heading">'+
                        '<h3 class="panel-title">' + $(this)[0].nome + '</h3>' +
                    '</div> ' +
                    '<div class="panel-body"> ' +
                    '<span style="color: #777">Matrícula </span><b>' + $(this)[0].matricula + '</b>' + 
                    '</div> ' +
                    '<div class="panel-footer">' +
                        '<span class="pull-left"><a onclick="verDetalhes('+ $(this)[0].id +');">Ver Detalhes</a></span> ' +
                        '<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> ' +
                        '<div class="clearfix"></div> ' +
                    '</div> ' + 
                '</div> ' +
            '</div> '); 
		});
	});	
}


function verDetalhes(id){
	$("#content").load("detalhes.html");
	carregarDetalhes(id);
}

function carregarDetalhes (id_filho) {
	$.get("/EducarEmCasa/classes/aluno/buscar-detalhes.php", {"id_filho": id_filho}, function(data){
		var obj = $.parseJSON(data);
			var linhas = '';
			for (var i = 0; i < obj.length; i++) {
				var linha = '<tr><td>'+ obj[i].d_nome+'</td><td>'+ obj[i].n_valor+'</td><td>'
							+ obj[i].f_valor+'</td><td>'+ obj[i].s_valor+'</td></tr>';
				linhas += linha;
			};
			$("table tr").after(linhas);
	});
}