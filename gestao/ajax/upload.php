<?php
require_once('../conexao.php');
$ds          = DIRECTORY_SEPARATOR;  //1
 
$storeFolder = '../uploads';   //2
 
if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];          //3             
      
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
    
    $targetFile =  $targetPath. $_FILES['file']['name'];  //5
 
    move_uploaded_file($tempFile,$targetFile); //6
    
    $sql = "INSERT INTO slide (standard_resolution, status) VALUES ('".$_FILES['file']['name']."', 1)";
    mysqli_query($conect, $sql) or die(error());
    $id = mysqli_insert_id($conect);
    echo $id;
}
?>  