<?php 
session_start(); 
if((!isset ($_SESSION['UserID']) == true) and (!isset ($_SESSION['UserNome']) == true)) { 
	unset($_SESSION['UserID']); 
	unset($_SESSION['UserNome']); 
	unset($_SESSION['UserTipo']);
	header('location:index.php'); 
} 
if($_SESSION['UserTipo'] != 1){
	header('location:dashboard.php');
}
$nome = $_SESSION['UserNome'];
?>
<?php require_once('header.php')?>
<?php require_once('menu.php')?>
<div class="row clearfix" style="margin-top:70px;">
		<div class="col-md-4 column">
			<div class="bem_vindo_user">
				<h4>Bem vindo, <?php echo $nome ?></h4>
			</div>
		</div>
		<div class="col-md-4 column">
			
		</div>
		<div class="col-md-4 column">
			
		</div>
</div>
<?php
include 'conexao.php';
$exibirAlert = 'hidden';
$msgAlert='';
$classAlert='';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$hastagPost = $_POST['hastag'];
	$hastag2Post = $_POST['hastag2'];
	$tempoAtualizacaoPost = $_POST['tempo_atualizacao'];
	$tempoFotoSlidePost = $_POST['tempo_foto_slide'];
	
	$sql = "UPDATE config SET hastag='$hastagPost', hastag2='$hastag2Post', tempo_atualizacao=$tempoAtualizacaoPost, tempo_foto_slide=$tempoFotoSlidePost WHERE id=1";
	if ($conect->query($sql) === TRUE) {
		$exibirAlert ='';
		$tipoAlert = 'Sucesso';
		$msgAlert = 'Alterado com sucesso!';
		$classAlert = 'success';
	} else {
		$exibirAlert ='';
		$tipoAlert = 'Error';
		$msgAlert = 'Erro ao alterar!';
		$classAlert = 'danger';
	}
}


$sql = 'SELECT * FROM config WHERE id=1';
$result = $conect->query($sql);
$hastag = ''; 
$tempoAtualizacao = '';
$tempoFotoSlide = '';
while($row = mysqli_fetch_array($result)) {
	$hastag = $row['hastag'];
	$hastag2 = $row['hastag2'];
	$tempoAtualizacao = $row['tempo_atualizacao'];
	$tempoFotoSlide = $row['tempo_foto_slide'];
}
?>
<div class="row clearfix">
	<div class="col-md-12 column">
		<div class="alert alert-<?php echo $classAlert?> alert-dismissable <?php echo $exibirAlert?>">
			 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h4>
				<?php echo $tipoAlert;?>
			</h4> <?php echo $msgAlert;?>
		</div>
	</div>
</div>
<div class="row clearfix">
		<div class="col-md-12 column">
			<h2>Configurações</h2>
			<form role="form" action="config.php" method="POST">
				<div class="form-group">
					 <label for="hastag">Hastag* (Obs: Coloque a hastag sem '#')</label><input type="text" class="form-control" id="hastag" name="hastag" value="<?php echo $hastag;?>" required/>
				</div>
				<div class="form-group">
					 <label for="hastag2">Hastag 2 (Obs: Coloque a hastag sem '#')</label><input type="text" class="form-control" id="hastag2" name="hastag2" value="<?php echo $hastag2;?>"/>
				</div>
				<div class="form-group">
					 <label for="tempoAtulizacao">Tempo botão atualização em minutos*</label><input type="text" class="form-control" id="tempo_atualizacao" name="tempo_atualizacao" value="<?php echo $tempoAtualizacao;?>" required/>
				</div>
				<div class="form-group">
					 <label for="tempo_foto_slide">Tempo da foto no slide em segundos*</label><input type="text" class="form-control" id="tempo_foto_slide" name="tempo_foto_slide" value="<?php echo$tempoFotoSlide;?>" required/>
				</div>
				
				<button type="submit" class="btn btn-primary">Atualizar</button>
			</form>
		</div>
</div>
	<?php 
		$sql = 'SELECT * FROM slide WHERE status=1';
		$result = $conect->query($sql);
		
	?>	
	<div class="row" style='height: 150px;'>
        <div class="col-lg-12">	
			<div class="main-box">
                <div class="main-box-body" >
					<header class="main-box-header">
	                    <h3 id="photos">Imagens Enviadas</h3>
	                </header>
	                <div id="gallery-photos-wrapper" style='box-shadow:2px 2px 3px; margin-bottom:20px;'>
                    	<ul id="gallery-photos" class="clearfix gallery-photos gallery-photos-hover">
                            <?php while($row = mysqli_fetch_array($result)) {?>
                            <li id="photo_<?php echo $row["id"]?>" data-id="<?php echo $row["id"]?>" class="col-md-2 col-sm-3 col-xs-6">
		    					<div class="photo-box" style="background-image: url(<?php echo 'uploads/'.$row["standard_resolution"] ?>)"></div>
					    		<a href="javascript:void(0);" class="remove-photo-link upload" title="Apagar">
					    			<span class="glyphicon glyphicon-trash delete_foto" aria-hidden="true"></span>
				    			</a>
	    					</li>
	    					<?php }?>
                        </ul>
	                </div>
				</div>
			</div>
		</div>
	</div>
<div class="row" style='clear:both;'>
            <div class="col-lg-12">
			<div>
				<div id="dropzone">
                    <form id="demo-upload" class="dropzone dz-clickable" action='ajax/upload.php' >
                       <div class="dz-default dz-message">
                       		<span>Arreste e solte aqui os arquivos para envia-los</span>
                       </div>
                    </form>
                    <span class="help-block text-left">Usar imagens 640x640. </span>
                </div>
			</div>
		</div>		
	</div>

	<script type="text/javascript" src="js/dropzone.js"></script>
	<script type="text/javascript">
	
	 $(function() {
		
		 $(document).on( 'click', 'ul#gallery-photos li a.remove-photo-link', function(){
			console.log('eeerrrre');
        	var id = $(this).parents("li").attr("data-id");
        	
        	$.ajax({
        		type: "POST",
        		url: "ajax/fotoRemoverAjax.php",
        		data: { id: id }
        		})
        		.done(function( data ) {
        			if(data){
        				$('ul#gallery-photos').find("[data-id='" + id + "']").remove();
            		}
        	});
         });
	 });
        $( document ).ready(function() {
		Dropzone.autoDiscover = false;
        var md = new Dropzone(".dropzone", {
        	url: 'ajax/upload.php',
            maxFilesize: "5", 
            addRemoveLinks: false,
            acceptedFiles: "image/*"
        });
        md.on("success", function (file, response) {

            	ref = $("ul#gallery-photos li").size();
        		ref++;
        		
				var html='';
	    		
	    		html += '<li id="photo_'+response+'" data-id="'+response+'" class="col-md-2 col-sm-3 col-xs-6">';
		    		html += '<div class="photo-box" style="background-image: url(uploads/'+file.name+')"></div>';
		    		html += '<a href="javascript:void(0);" class="remove-photo-link upload" title="Apagar">';		    			
		    		html += '<span class="glyphicon glyphicon-trash delete_foto" aria-hidden="true"></span>';    				
	    			html += '</a>';
    			html += '</li>';

	    		if(ref > 1){
	    			$('ul#gallery-photos li:last').after(html);
	    		}else{
	    			$('ul#gallery-photos').append(html);
	    		}

	    		// add input hidden form

	    		html = "";
	    		html = "<input type='hidden' name='images[]' value='"+response+"' />";
	    		$('form.form-horizontal').prepend(html);
	    		
        });
        });
	</script>
	<?php require_once('footer.php')?>