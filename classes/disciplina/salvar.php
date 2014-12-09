<?php
	require_once ("Disciplina.class.php");
	require_once ("DisciplinaDAO.class.php");

	$nome = $_POST['nome'];
	$codigo = $_POST['codigo'];
	$carga_horaria = $_POST['carga_horaria'];

	$disciplina = new Disciplina($nome, $codigo, $carga_horaria);
	$disciplinaDAO = new DisciplinaDAO();
	$disciplinaDAO->salvar($disciplina);
?>