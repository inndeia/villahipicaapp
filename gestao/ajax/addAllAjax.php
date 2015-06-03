<?php 
include "../conexao.php";
$dados = $_POST['dados'];
//consultar se existe o id_foto cadastrado

$retorno = array();
for($i = 1;$i < count($dados);$i++){
	$result = $conect->query("SELECT * FROM slide WHERE id_foto='".$dados[$i][0]."'");
	
	if ($result->num_rows == 0) {
		$sql = "INSERT INTO slide (id_foto, thumbnail, low_resolution, standard_resolution) VALUES ('".$dados[$i][0]."', '".$dados[$i][1][0]."', '".$dados[$i][1][1]."', '".$dados[$i][1][2]."')";
		mysqli_query($conect, $sql) or die(error());
		$id_slide = mysqli_insert_id($conect);
		for($x = 0;$x<count($dados[$i][2]);$x++){
			$sql = "INSERT INTO tags_slide (id_slide, tag) VALUES ('".$id_slide."', '".$dados[$i][2][$x]."')";
			mysqli_query($conect, $sql) or die(error());
		}
	}
	
}
$response = array("success" => true); 
echo json_encode($response); 
?>