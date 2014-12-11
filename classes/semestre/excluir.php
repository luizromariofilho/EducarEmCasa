<?php
	require_once ("SemestreDAO.class.php");
	$id = $_POST["id"];

	$semestreDAO = new SemestreDAO();
	
	echo $semestreDAO->delete($id);
?>