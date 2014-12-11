<?php
	require_once ("AlunoDAO.class.php");
	$id = $_GET["id_filho"];

	$alunoDAO = new AlunoDAO();
	
	$json = json_encode($alunoDAO->getDetalhes($id));
	echo $json;
?>