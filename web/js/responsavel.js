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
                    '    <a onclick="verNotas('+ $(this)[0].id +');">Ver Notas</a>' + 
                    '    <a onclick="verFaltas('+ $(this)[0].id +');">Ver Faltas</a>' + 
                    '</div> ' +
                '</div> ' +
            '</div> '); 
		});
	});	
}


function verNotas(id){
	alert(id);
}

function verFaltas(id){
	alert(id);
}