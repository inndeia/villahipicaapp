<?php 
include "../conexao.php";
$id = $_POST['id'];
$sql = "SELECT * FROM slide WHERE id=$id";
$result = $conect->query($sql);
while($row = mysqli_fetch_array($result)) {
	unlink('../uploads/'.$row['standard_resolution']);
}	
$sql2 = "DELETE FROM slide WHERE id=$id";
if ($conect->query($sql2) === TRUE) {
	$response = array("success" => true); 
	echo json_encode($response);
}else{
	die('erro');
}

?>