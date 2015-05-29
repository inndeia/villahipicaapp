		<div class="row clearfix" style="margin-top: 100px;">
			<div class="col-md-4 column">
			</div>
			<div class="col-md-4 column">
				<div class="logo_footer">
					<p>Todos os direitos reservados. &copy; <?php echo date('Y')?></p>
					<a href="http://www.inndeia.com" target="_black"><img src="img/logo_inndeia.png" /></a>
				</div>
			</div>
			<div class="col-md-4 column">
			</div>
		</div>
	</div>	
		<!-- Scripts -->
		<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript">
		
			$( document ).ready(function() {
				var tag = 'resortvillahipica';
				var next_url ='';			
				var url = "https://api.instagram.com/v1/tags/"+ tag +"/media/recent?access_token=927180325.4181fa4.6334410f8b7147c79d2c8e040860eb16&count=9";
				// AO CARREGAR A PAGIMA TRAZ AS FOTOS DO INSTAGRAM
				$.ajax({
			    	method: "GET",
		            url: url, 
		            dataType: "jsonp",		    		    	
			    	success: function(data){
			           	var header = '';
			           
			           	for (i = 0; i < data.data.length; i++) { 
				           	header += '<tr>';
				           	header += '<td>';
			           		header += (i+1);
			           		header += '<imput type="hidden" name="id" value="'+data.data[i].id+'"/>';
			           		header += '</td>';
				           	header += '<td>';
			           		header += '<img src="'+data.data[i].images.thumbnail.url+'" alt="" >';
			           		header += '<imput type="hidden" name="thumbnail" value="'+data.data[i].images.thumbnail.url+'"/>';
			           		header += '<imput type="hidden" name="low_resolution" value="'+data.data[i].images.low_resolution.url+'"/>';
			           		header += '<imput type="hidden" name="standard_resolution" value="'+data.data[i].images.standard_resolution.url+'"/>';
			           		header += '</td>';
			           		header += '<td> <p>';
			           		for (y = 0; y < data.data[i].tags.length; y++) {
			           			header += '#'+data.data[i].tags[y]+' ';
			           			header += '<imput type="hidden" name="tags[]" value="'+data.data[i].tags[y]+'"/>';
			           		}
			           		header += '</p></td>';				           		
			           		header += '<td>';
			           		header += '<a class="btn btn-success teste" id="btnAdicionar'+i+'" onclick="javascript:Adicionar();">Adicionar ao Silde</a>';
			           		header += '</td>';
			           		header += '</tr>';
			           	}		                
			           	
			           	if(data.pagination.next_url){
			           		next_url = data.pagination.next_url;
			           		$('#pagination').show();
			           	}else{
							$('#pagination').hide();
			           	}
			           	
		                $('#fotos_instagram').html(header);
	
			    	}	
				});
				// AO CLICAR NO BOTÃO #btn TRAZ AS FOTOS DO INSTAGRAM
				$("#btn").click(function(){	
				    $.ajax({
				    	method: "GET",
			            url: url, 
			            dataType: "jsonp",		    		    	
				    	success: function(data){
				           	var header = '';
				           	for (i = 0; i < data.data.length; i++) { 
					           	header += '<tr>';
					           	header += '<td>';
				           		header += (i+1);
				           		header += '</td>';
					           	header += '<td>';
				           		header += '<img src="'+data.data[i].images.thumbnail.url+'" alt="" >';
				           		header += '</td>';
				           		header += '<td> <p>';
				           		for (y = 0; y < data.data[i].tags.length; y++) {
				           			header += '#'+data.data[i].tags[y]+' ';
				           		}
				           		header += '</p></td>';				           		
				           		header += '<td>';
				           		header += '<button class="btn btn-success" id="btnAdicionar" onclick="Adicionar();" >Adicionar ao Silde</button>';
				           		header += '</td>';
				           		header += '</tr>';
				           	}		                
				           	
				           	if(data.pagination.next_url){
				           		next_url = data.pagination.next_url;
				           		$('#pagination').show();
				           	}else{
								$('#pagination').hide();
				           	}
			                $('#fotos_instagram').html(header);
		
				    	}	
					});
				});			
			
				$("#btnMais").click(function(){	
					$.ajax({
				    	method: "GET",
			            url: next_url, 
			            dataType: "jsonp",		    		    	
				    	success: function(data){
				           	var header = '';
				        	var x = 9;
				           	for (i = 0; i < data.data.length; i++) { 
					           	header += '<tr>';
					           	header += '<td>';
				           		header += (++x);
				           		header += '</td>';
					           	header += '<td>';
				           		header += '<img src="'+data.data[i].images.thumbnail.url+'" alt="" >';
				           		header += '</td>';	
				           		header += '<td> <p>';
				           		for (y = 0; y < data.data[i].tags.length; y++) {
				           			header += '#'+data.data[i].tags[y]+' ';
				           		}
				           		header += '</p></td>';			           		
				           		header += '<td>';
				           		header += '<button class="btn btn-success" id="btnAdicionar" onclick="Adicionar();>Adicionar ao Silde</button>';
				           		header += '</td>';
				           		header += '</tr>';
				           	}		                
				           	if(data.pagination.next_url){
				           		next_url = data.pagination.next_url;
				           		$('#pagination').show();
				           	}else{
								$('#pagination').hide();
				           	}
			                $('#fotos_instagram').html('');
			                $('#fotos_instagram').html(header);
		
				    	}	
					});
					$('.teste').click(function(){	
						alert('teste');
					});
				});	
				$('.teste').click(function(){	
					alert('teste');
				});
				$(function(){
					function Adicionar(){
						console.log('eee');
						var par = $(this).parent().parent();
						var id_foto  = par.children("td:nth-child(1)");
						var images  = par.children("td:nth-child(2)");
						var tags  = par.children("td:nth-child(3)");
						console.log(id_foto.children("input[type=hidden]").val());
						
					}
					$("#btnAdicionar").bind("click", Adicionar); 
				});
				
			});	

			
		</script>
	</body>
</html>