<?php 
include "../conexao.php";
$id = $_POST['id'];
$sql = "DELETE FROM slide WHERE id=$id";
if ($conect->query($sql) === TRUE) {
	$sql2 = "DELETE FROM tags_slide WHERE id_slide=$id";
	if ($conect->query($sql2) === TRUE) {
		$response = array("success" => true); 
		echo json_encode($response);
	}else{
		die('erro');
	}
} else {
     die('error');
}
?>