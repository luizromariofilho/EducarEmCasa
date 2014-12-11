
<?php
	require_once ("SemestreDAO.class.php");
	$id = $_GET["id"];

	$semestreDAO = new SemestreDAO();
	
	$json = json_encode($semestreDAO->get($id));
	echo $json;
?>