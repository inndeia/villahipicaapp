<?php 
include "../conexao.php";
$id_foto = $_POST['id'];
$images = $_POST['images']; 
$tags = $_POST['tags']; 

$result = $conect->query("SELECT * FROM slide WHERE id_foto='".$id_foto."'");
if ($result->num_rows == 0) {
	$sql = "INSERT INTO slide (id_foto, thumbnail, low_resolution, standard_resolution) VALUES ('$id_foto', '$images[0]', '$images[1]', '$images[2]')"; 
	mysqli_query($conect, $sql) or die(error()); 
	$id_slide = mysqli_insert_id($conect);
	for($i = 0;$i<count($tags);$i++){
		$sql = "INSERT INTO tags_slide (id_slide, tag) VALUES ('".$id_slide."', '".$tags[$i]."')"; 
		mysqli_query($conect, $sql) or die(error());
	}
}
$response = array("success" => true); 
echo json_encode($response); 
?>