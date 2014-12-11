<?php
	require_once ("Semestre.class.php");
	require_once ("SemestreDAO.class.php");

	$id = $_POST['id'];
	$valor = $_POST['valor'];

	$semestre = new Semestre($valor);
	if(isset($id) && $id != null && $id != ''){
		$semestre->setId($id);
	}
	$semestreDAO = new SemestreDAO();
	echo $semestreDAO->salvar($semestre);
?>