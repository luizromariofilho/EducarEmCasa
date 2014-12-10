<?php
	require_once ("DisciplinaDAO.class.php");
	$id = $_POST["id"];

	$disciplinaDAO = new DisciplinaDAO();
	
	echo $disciplinaDAO->delete($id);
?>