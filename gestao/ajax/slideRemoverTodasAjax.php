<?php 
include "../conexao.php";
$sql = "DELETE FROM slide";
if ($conect->query($sql) === TRUE) {
	$sql2 = "DELETE FROM tags_slide";
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