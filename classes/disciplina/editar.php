<?php
	require_once ("DisciplinaDAO.class.php");
	$id = $_GET["id"];

	$disciplinaDAO = new DisciplinaDAO();
	
	$json = json_encode($disciplinaDAO->get($id));
	echo $json;
?>