
<?php
	require_once ("TurmaDAO.class.php");
	$id = $_GET["id"];

	$turmaDAO = new TurmaDAO();
	
	$json = json_encode($turmaDAO->get($id));
	echo $json;
?>