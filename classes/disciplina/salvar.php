<?php
	require_once ("Disciplina.class.php");
	require_once ("DisciplinaDAO.class.php");

	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$codigo = $_POST['codigo'];
	$carga_horaria = $_POST['carga_horaria'];

	$disciplina = new Disciplina($nome, $codigo, $carga_horaria);
	if(isset($id) && $id != null && $id != ''){
		$disciplina->setId($id);
	}
	$disciplinaDAO = new DisciplinaDAO();
	echo $disciplinaDAO->salvar($disciplina);
?>