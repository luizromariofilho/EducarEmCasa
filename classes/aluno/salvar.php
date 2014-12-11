<?php
	require_once ("Aluno.class.php");
	require_once ("AlunoDAO.class.php");

	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$rg = $_POST['rg'];
	$cpf = $_POST['cpf'];
	$matricula = $_POST['matricula'];
	$usuario_id = $_POST['usuario_id'];

	$aluno = new Aluno($nome, $rg, $cpf, $matricula, $usuario_id);
	if(isset($id) && $id != null && $id != ''){
		$aluno->setId($id);
	}
	$alunoDAO = new AlunoDAO();
	echo $alunoDAO->salvar($aluno);
?>