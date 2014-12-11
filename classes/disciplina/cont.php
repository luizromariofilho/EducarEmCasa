<?php
	require_once ("DisciplinaDAO.class.php");

	$disciplinaDAO = new DisciplinaDAO();
	
	$json = json_encode($disciplinaDAO->count());
	echo $json;
?>