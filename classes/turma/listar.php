<?php
	require_once ("TurmaDAO.class.php");

	$turmaDAO = new TurmaDAO();
	$json = json_encode($turmaDAO->getAll());
	echo $json;
?>