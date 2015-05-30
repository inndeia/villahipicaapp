<?php 

	require_once('../conexao.php');

	$sql = 'SELECT id_foto FROM slide';
	$result = $conect->query($sql);
	$retorno = array();
	while($row = mysqli_fetch_array($result)) { 
	  $retorno[] = $row["id_foto"] ; 
	} 
	
	echo json_encode($retorno);

	
?>