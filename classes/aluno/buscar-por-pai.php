<?php
	require_once ("AlunoDAO.class.php");
	$id = $_GET["id"];

	$alunoDAO = new AlunoDAO();
	
	$json = json_encode($alunoDAO->getPorPai($id));
	echo $json;
?>