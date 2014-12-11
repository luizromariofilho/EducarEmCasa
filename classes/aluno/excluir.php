<?php
	require_once ("AlunoDAO.class.php");
	$id = $_POST["id"];

	$alunoDAO = new AlunoDAO();
	
	echo $alunoDAO->delete($id);
?>