<?php
	require_once ("Turma.class.php");
	require_once ("TurmaDAO.class.php");

	$turma_id = $_POST['turma_id'];
	$nota = $_POST['nota'];
	$falta = $_POST['falta'];

	$turmaDAO = new TurmaDAO();
	echo $turmaDAO->salvarNotas($turma_id, $nota, $falta);
?>