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
			           		header += '</td>';
				           	header += '<td>';
			           		header += '<img src="'+data.data[i].images.thumbnail.url+'" alt="" >';
			           		header += '</td>';			           		
			           		header += '<td>';
			           		header += '<button class="btn btn-success" id="btn" >Adicionar ao Silde</button>';
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
				           		header += '<td>';
				           		header += '<button class="btn btn-success" id="" >Adicionar ao Silde</button>';
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
				           		header += '<td>';
				           		header += '<button class="btn btn-success" id="" >Adicionar ao Silde</button>';
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
				});	
			});	
		</script>
	</body>
</html>