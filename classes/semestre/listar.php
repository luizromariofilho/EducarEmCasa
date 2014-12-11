<?php
	require_once ("SemestreDAO.class.php");

	$semestreDAO = new SemestreDAO();
	$json = json_encode($semestreDAO->getAll());
	echo $json;
?>