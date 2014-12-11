<?php
	require_once ("TurmaDAO.class.php");
	$id = $_POST["id"];

	$turmaDAO = new TurmaDAO();
	
	echo $turmaDAO->delete($id);
?>