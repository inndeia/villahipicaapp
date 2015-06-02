<?php 

	require_once('../conexao.php');
	$id = $_POST['id'];
	
	if($id != ''){
		$sql = "DELETE FROM user WHERE id=$id";
	
		if ($conect->query($sql) === TRUE) {
			$response = array("success" => true);
		} else {
			$response = array("success" => false);
		}
	}else{
		$response = array("success" => false);
	}
	echo json_encode($response);
		
?>