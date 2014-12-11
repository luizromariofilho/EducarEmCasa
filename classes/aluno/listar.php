<?php
	require_once ("AlunoDAO.class.php");

	$alunoDAO = new AlunoDAO();
	$json = json_encode($alunoDAO->getAll());
	echo $json;
?>