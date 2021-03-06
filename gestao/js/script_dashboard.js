
			$( document ).ready(function() {
				var tag = 'resortvillahipica';
						
				var url = "https://api.instagram.com/v1/tags/"+ tag +"/media/recent?access_token=927180325.4181fa4.6334410f8b7147c79d2c8e040860eb16";
				var id_fotos = new Array();
				listaIdFotos();
				function listaIdFotos(){
					
					$.ajax({
						method:"POST",
						url:"ajax/idFotosAjax.php",
						async: false,
						success:function(data){
							id_fotos = JSON.parse(data);
							atualizarFotos();
							
						}
					});
				}
				// AO CARREGAR A PAGIMA TRAZ AS FOTOS DO INSTAGRAM
				function atualizarFotos(){
					var teste='';
					$.ajax({
				    	method: "POST",
			            url: url, 
			            dataType: "jsonp",
			            async: false,   		    	
				    	success: function(data){
				           	var header = '';
				            var x = 0;
				           	for (i = 0; i < data.data.length; i++) { 
				           		if(jQuery.inArray( data.data[i].id, id_fotos ) < 0){
						           	header += '<tr>';
						           	header += '<td>';
					           		header += (++x);
					           		header += '<input type="hidden" name="id" value="'+data.data[i].id+'"/>';
					           		header += '</td>';
						           	header += '<td>';
						           	header += '<a class="fancybox"  href="'+data.data[i].images.standard_resolution.url+'"><img src="'+data.data[i].images.thumbnail.url+'" alt="" /></a>';
					           		header += '<input type="hidden" name="thumbnail" value="'+data.data[i].images.thumbnail.url+'"/>';
					           		header += '<input type="hidden" name="low_resolution" value="'+data.data[i].images.low_resolution.url+'"/>';
					           		header += '<input type="hidden" name="standard_resolution" value="'+data.data[i].images.standard_resolution.url+'"/>';
					           		header += '</td>';
					           		header += '<td class="mobile"> <p>';
					           		for (y = 0; y < data.data[i].tags.length; y++) {
					           			header += '#'+data.data[i].tags[y]+' ';
					           			header += '<input type="hidden" name="tags[]" value="'+data.data[i].tags[y]+'"/>';
					           		}
					           		header += '</p></td>';				           		
					           		header += '<td>';
					           		header += '<button class="btn btn-success" id="btnAdicionar" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>';
					           		header += '</td>';
					           		header += '</tr>';
				           		}
				           	}	
				           	
			                $('#fotos_instagram').html(header);
		
				    	}	
					});
				}
				// AO CLICAR NO BOTÃO #btn TRAZ AS FOTOS DO INSTAGRAM
				$("#btn").click(function(){	
				    $.ajax({
				    	method: "GET",
			            url: url, 
			            dataType: "jsonp",    		    	
				    	success: function(data){
				           	var header = '';
				           	var x = 0;
				           	for (i = 0; i < data.data.length; i++) { 
				           		if(jQuery.inArray( data.data[i].id, id_fotos ) < 0){
						           	header += '<tr>';
						           	header += '<td>';
					           		header += (++x);
					           		header += '<input type="hidden" name="id" value="'+data.data[i].id+'"/>';
					           		header += '</td>';
						           	header += '<td>';
					           		header += '<a class="fancybox"  href="'+data.data[i].images.standard_resolution.url+'"><img src="'+data.data[i].images.thumbnail.url+'" alt="" /></a>';
					           		header += '<input type="hidden" name="thumbnail" value="'+data.data[i].images.thumbnail.url+'"/>';
					           		header += '<input type="hidden" name="low_resolution" value="'+data.data[i].images.low_resolution.url+'"/>';
					           		header += '<input type="hidden" name="standard_resolution" value="'+data.data[i].images.standard_resolution.url+'"/>';
					           		header += '</td>';
					           		header += '<td class="mobile"> <p>';
					           		for (y = 0; y < data.data[i].tags.length; y++) {
					           			header += '#'+data.data[i].tags[y]+' ';
					           			header += '<input type="hidden" name="tags[]" value="'+data.data[i].tags[y]+'"/>';
					           		}
					           		header += '</p></td>';				           		
					           		header += '<td>';
					           		header += '<button class="btn btn-success" id="btnAdicionar" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>';
					           		header += '</td>';
					           		header += '</tr>';
				           		}
				           	}                
				           	
			                $('#fotos_instagram').html(header);
							startCountdown();
				    	}	
					});
				});			
			
				$('#tbl').on('click', '#btnAdicionar', function (event) {

				    var $botao = $(event.target);
				    var $tr = $botao.closest('tr');
				    var id = $tr.children("td:nth-child(1)");
					id = id.children("input[name=id]").val();

					var img = $tr.children("td:nth-child(2)");

					var images = new Array();
					images = [img.children("input[name=thumbnail]").val(), 
								img.children("input[name=low_resolution]").val(),
								img.children("input[name=standard_resolution]").val() ];

					var tag = $tr.children("td:nth-child(3)");
					var tags = new Array();
					tag.children("p").children("input[name='tags[]']").each(function(){
					     tags.push($(this).val());
					  });
				    $.ajax({                 
				    	type: 'POST',                 
				    	dataType: 'json',                 
				    	url: 'ajax/ajax.php',            
				    	data: {
				    		id:id,
				    		images:images,
				    		tags:tags
				    	},                 
				    	success: function(response) {
				    	  $tr.remove();
				    	  listaIdFotos();
				    	}
				    });

				});
			});	
				var tempo = new Number();
				// Tempo em segundos
				tempo = 180;

				function startCountdown(){
					
					// Se o tempo não for zerado
					if((tempo - 1) >= 0){

						// Pega a parte inteira dos minutos
						var min = parseInt(tempo/60);
						// Calcula os segundos restantes
						var seg = tempo%60;

						// Formata o número menor que dez, ex: 08, 07, ...
						if(min < 10){
							min = "0"+min;
							min = min.substr(0, 2);
						}
						if(seg <=9){
							seg = "0"+seg;
						}

						// Cria a variável para formatar no estilo hora/cronômetro
						horaImprimivel = 'Tempo para nova atualização 00:' + min + ':' + seg;
						//JQuery pra setar o valor
						$("#sessao").html('');
						$("#sessao").html(horaImprimivel);

						// Define que a função será executada novamente em 1000ms = 1 segundo
						setTimeout('startCountdown()',1000);

						// diminui o tempo
						--tempo;
						$("#btn").addClass('disabled');

					// Quando o contador chegar a zero faz esta ação
					} else {
						$("#sessao").html('');
						$("#btn").removeClass('disabled');
					}

				}