<?php 

	require_once('../conexao.php');

	$sql = 'SELECT * FROM slide WHERE status=0 ORDER BY id DESC';
	$result = $conect->query($sql);	
	$dados = array();
	while($row = mysqli_fetch_array($result)) { 
		$retorno = array();
		$retorno['id'] = $row['id'];
		$retorno['thumbnail'] = $row['thumbnail'];
		$retorno['standard_resolution'] = $row['standard_resolution'];
		$retorno['low_resolution'] = $row['low_resolution'];
	  	$retorno['id_foto'] = $row["id_foto"]; 

	  	$sql2 = 'SELECT * FROM tags_slide where id_slide='.$retorno['id'];
		$result2 = $conect->query($sql2);
		$tags = array();
		while($row2 = mysqli_fetch_array($result2)) {
			$tags[] = $row2['tag'];
		}
		$retorno['tags'] = $tags; 
		$dados[] = $retorno;
	} 
	
	echo json_encode($dados);

	
?>