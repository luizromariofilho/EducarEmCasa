<?php
	require_once ("Turma.class.php");
	require_once ("TurmaDAO.class.php");

	$id = $_POST['id'];
	$aluno_id = $_POST['aluno_id'];
	$disciplina_id = $_POST['disciplina_id'];
	$semestre_id = $_POST['semestre_id'];


	$turma = new Turma($aluno_id, $disciplina_id, $semestre_id);
	if(isset($id) && $id != null && $id != ''){
		$turma->setId($id);
	}
	$turmaDAO = new TurmaDAO();
	echo $turmaDAO->salvar($turma);
?>