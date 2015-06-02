<?php 

	require_once('../conexao.php');
	$id = $_POST['id'];

	$sql = 'SELECT * FROM user WHERE id='.$id;
	$result = $conect->query($sql);	
	$dados = array();
	while($row = mysqli_fetch_array($result)) { 
		$retorno = array();
		$retorno['id'] = $row['id'];
		$retorno['nome'] = $row['nome'];
		$retorno['email'] = $row['email'];
		$retorno['pass'] = $row['pass'];
	  	$retorno['tipo'] = $row["tipo"]; 

		$dados[] = $retorno;
	} 
	
	echo json_encode($dados);

	
?>