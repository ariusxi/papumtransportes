$(function(){
	var current = window.location.href;
	var url = "http://localhost/backend/";
	var numitems = 1;

	function FormataCnpj(campo, teclapres){
		var tecla = teclapres.keyCode;
		var vr = new String(campo.value);	
		vr = vr.replace(".", "");
		vr = vr.replace("/", "");
		vr = vr.replace("-", "");
		tam = vr.length + 1;
		if (tecla != 14){
			if (tam == 3)
				campo.value = vr.substr(0, 2) + '.';
			if (tam == 6)
				campo.value = vr.substr(0, 2) + '.' + vr.substr(2, 5) + '.';
			if (tam == 10)
				campo.value = vr.substr(0, 2) + '.' + vr.substr(2, 3) + '.' + vr.substr(6, 3) + '/';
			if (tam == 15)
				campo.value = vr.substr(0, 2) + '.' + vr.substr(2, 3) + '.' + vr.substr(6, 3) + '/' + vr.substr(9, 4) + '-' + vr.substr(13, 2);
		}
	}
	function formatar(mascara, documento){
	 	var i = documento.value.length;
	 	var saida = mascara.substring(0,1);
	 	var texto = mascara.substring(i)
	  
	  	if (texto.substring(0,1) != saida){
			documento.value += texto.substring(0,1);
	 	}
	}
	function validarCNPJ(cnpj) {
 
	    cnpj = cnpj.replace(/[^\d]+/g,'');
	 
	    if(cnpj == '') return false;
	     
	    if (cnpj.length != 14)
	        return false;
	 
	    // Elimina CNPJs invalidos conhecidos
	    if (cnpj == "00000000000000" || 
	        cnpj == "11111111111111" || 
	        cnpj == "22222222222222" || 
	        cnpj == "33333333333333" || 
	        cnpj == "44444444444444" || 
	        cnpj == "55555555555555" || 
	        cnpj == "66666666666666" || 
	        cnpj == "77777777777777" || 
	        cnpj == "88888888888888" || 
	        cnpj == "99999999999999"){
			$("#cnpj")css('border', '1px solid red');

            $('#cnpj').val('');
            $('#cnpj').focus();
		}

	    tamanho = cnpj.length - 2
	    numeros = cnpj.substring(0,tamanho);
	    digitos = cnpj.substring(tamanho);
	    soma = 0;
	    pos = tamanho - 7;
	    for (i = tamanho; i >= 1; i--) {
	      soma += numeros.charAt(tamanho - i) * pos--;
	      if (pos < 2)
	            pos = 9;
	    }
	    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
	    if (resultado != digitos.charAt(0)){
					$("#cnpj")css('border', '1px solid red');

	                $('#cnpj').val('');
	                $('#cnpj').focus();
					}
	         
	    tamanho = tamanho + 1;
	    numeros = cnpj.substring(0,tamanho);
	    soma = 0;
	    pos = tamanho - 7;
	    for (i = tamanho; i >= 1; i--) {
	      soma += numeros.charAt(tamanho - i) * pos--;
	      if (pos < 2)
	            pos = 9;
	    }
	    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
	    if (resultado != digitos.charAt(1)){
			$("#cnpj")css('border', '1px solid red');

            $('#cnpj').val('');
            $('#cnpj').focus();
		}

		$("#cnpj")css('border', '1px solid green');
	           
	    return true;
	    
	}
	function SomenteNumero(e){
	    var tecla=(window.event)?event.keyCode:e.which;   
	    if((tecla>47 && tecla<58)) return true;
	    else{
    		if (tecla==8 || tecla==0) return true;
		else  return false;
    		}
	}
	function verifyCategorias(){
		var categorias = "";
		for(var i = 1; i <= 4; i++){
			if($(".categoria"+i).prop("checked") == true){
				if(categorias == ""){
					categorias = $(".categoria"+i).val();
				}else{
					categorias += ","+$(".categoria"+i).val();
				}
			}
		}
		return categorias;
	}
	
	function verifyCategoria(){
		var categorias = "";
		for(var i = 1; i <= 4; i++){
			if($("input[name=categoria_"+i+"]").prop("checked")){
				if(categorias == ""){
					categorias = $("input[name=categoria_"+i+"]").val();
				}else{
					categorias += ","+$("input[name=categoria_"+i+"]").val();
				}
			}
		}	
		return categorias;
	}
	function verifyEstado(){
		var estados = "";
		for(var i = 1; i <= 4; i++){
			if($("input[name=estado_"+i+"]").prop("checked")){
				if(estados == ""){
					estados = $("input[name=estado_"+i+"]").val();
				}else{
					estados += ","+$("input[name=estado_"+i+"]").val();
				}
			}
		}
		return estados;
	}
	function verifyCidade(){
		var cidades = "";
		for(var i = 1; i <= 4; i++){
			if($("input[name=cidade_"+i+"]").prop("checked")){
				if(cidades == ""){
					cidades = $("input[name=cidade_"+i+"]").val();
				}else{
					cidades += ","+$("input[name=cidade_"+i+"]").val();
				}
			}
		}
		return cidades;
	}

	$('#cpf').blur(function(){
        var cpf = $('#cpf').val().replace(/[^0-9]/g, '').toString();
		 if( cpf.length != 11 ||
			cpf == "12345678910" ||
			cpf == "00000000000" || 
			cpf == "11111111111" || 
			cpf == "22222222222" || 
			cpf == "33333333333" || 
			cpf == "44444444444" || 
			cpf == "55555555555" || 
			cpf == "66666666666" || 
			cpf == "77777777777" || 
			cpf == "88888888888" || 
			cpf == "99999999999"){
				$('#cpf').css('border','1px solid red');

	            $('#cpf').val('');
	            $('#cpf').focus();
			}
        if( cpf.length == 11 && cpf != ''){
            var v = [];

            //Calcula o primeiro dígito de verificação.
            v[0] = 1 * cpf[0] + 2 * cpf[1] + 3 * cpf[2];
            v[0] += 4 * cpf[3] + 5 * cpf[4] + 6 * cpf[5];
            v[0] += 7 * cpf[6] + 8 * cpf[7] + 9 * cpf[8];
            v[0] = v[0] % 11;
            v[0] = v[0] % 10;

            //Calcula o segundo dígito de verificação.
            v[1] = 1 * cpf[1] + 2 * cpf[2] + 3 * cpf[3];
            v[1] += 4 * cpf[4] + 5 * cpf[5] + 6 * cpf[6];
            v[1] += 7 * cpf[7] + 8 * cpf[8] + 9 * v[0];
            v[1] = v[1] % 11;
            v[1] = v[1] % 10;

            //Retorna Verdadeiro se os dígitos de verificação são os esperados.
            if ( (v[0] != cpf[9]) || (v[1] != cpf[10]) ){
            	$('#cpf').css('border','1px solid red');
                $('#cpf').val('');
                $('#cpf').focus();
            }else{
            	$('#cpf').css('border','1px solid green');
            }
        }else{
            $('#cpf').css('border','1px solid red');

            $('#cpf').val('');
            $('#cpf').focus();
        }
        console.log(cpf);
    });

	$('#contato').submit(function(e){
		e.preventDefault();

		var name = $("#name").val();
		var email = $("#email").val();
		var message = $("#message").val();

		if(name == "" || email == "" || message == ""){
			$("#feedback_c").html("<div style='color:red;'>Você deve preencher todos os campos</div>");
			hidemessage("#feedback_c");
			return false;
		}

		$.ajax({
			type: 'POST',
			url: url+'sys/Contato/sendContato',
			dataType: 'json',
			data: {
				name: name,
				email: email,
				message: message
			}, success: function(retorno){
				if(retorno.status == 'ok'){
					$("#feedback_c").html("<div style='color:green;'>Mensagem enviada com sucesso, enviaremos uma mensagem resposta assim que possível</div>");
					hidemessage("#feedback_c");
				}else{
					$("#feedback_c").html("<div style='color:red;'>Ocorreu um erro tente novamente mais tarde</div>");
					hidemessage("#feedback_c");
				}
			}, error: function(e){
				console.log(e);
			}
		})

		return false;
	});

	$('#search').submit(function(e){
		e.preventDefault();
		
		var search = $("#query").val();
		
		window.location.href = url+"search/"+search;
		
		return false;
	});

	
	$.ajax({
		type: 'POST',
		url: url+'sys/Categoria/categoria',
		dataType: 'json',
		success: function(retorno){
			if(retorno.status == 'ok'){
				$.each(retorno.results, function(i, value){
					$(".categorias").append("<div class='col-md-3 element gall mudancas isotope-item'><a class='plS' rel='prettyPhoto[gallery2]'><img class='img-responsive picsGall' src='"+url+"images/home/categorias/"+value.imagem+"' alt='pic2 Gallery'></a><div class='view project_descr center'><h3><a class='categoria' id='"+value.id+"' style='cursor:pointer;'>"+value.categoria+"</a></h3><ul><li><i class='fa fa-eye'></i>"+value.views+"</li></ul></div></div>");
				});
			}else{
				$(".categorias").html("<div class='col-md-12'>Nenhuma categoria disponivel</div>");
			}
		}, error: function(e){
			console.log(e);
		}
	});
	
	$(".categorias_transp").ready(function(){
		$.ajax({
			type: 'POST',
			url: url+'sys/Categoria/categoriaTransp',
			dataType: 'json',
			beforeSend: function(){
				$(".categorias_transp").html("Aguarde...");
			},
			success: function(retorno){
				$(".categorias_transp").html("");
				$.each(retorno.results, function(i, value){
					var html = "";
					html += "<li class='list-group-item'>";
					html += "<p><input type='radio' class='categoria"+(i+1)+"' value='"+value.categoria.id+"'/>&nbsp;"+value.categoria.nome+"</p>";
					html += "<label>Anúncios nessa categoria: "+value.categoria.views+"</label><br/>";
					html += "Subcategorias: ";
					var subcategorias = "";
					$.each(value.categoria.subcategorias, function(n, subcategoria){
						if(subcategorias == ""){
							if(subcategoria != undefined){
								subcategorias = subcategoria;
							}
						}else{
							subcategorias += ", "+subcategoria;
						}
					});
					html += subcategorias;
					html += "</li>";
					
					$(".categorias_transp").append(html);
				});
			}, error: function(e){
				console.log(e);
			}
		});
	});

	$("#resultados").ready(function(){
		var search = $("#query").val();

		if(search == ""){
			$("#query").focus();
		}

		$.ajax({
			type: 'POST',
			url: url+'sys/Cargas/pesquisa',
			dataType: 'json',
			data: {
				search: search
			}, success: function(retorno){
				if(retorno.status == 'ok'){
					var html = '<ul class="list-group">';
					$.each(retorno.results, function(i, value){
						html += '<li class="list-group-item">';
						html += '<p>';
						html += '<a href="'+url+'anuncio/'+value.id+'"><h3 class="list-group-item-heading">'+value.titulo+'</h3></a>';
						html += '<strong>Retirada:</strong> '+value.retirada+'<br/>';
						html += '<strong>Entrega:</strong> '+value.entrega+'<br/>';
						html += '<strong>Criado em:</strong> '+value.created_at+'<br/>';
						html += '</p>';
						html += '</li>';
					});
					html += '</ul>';
					$('#resultados').html(html);
				}else{
					$('#resultados').html("Nenhum anúncio encontrado");
				}
			}
		});
	});

	$(".filter").click(function(e){
		var categoria = verifyCategoria();
		var estado = verifyEstado();
		var cidade = verifyCidade();
		var search = $("#query").val();

		$.ajax({
			type: 'POST',
			url: url+'sys/Cargas/pesquisa',
			dataType: 'json',
			data: {
				search: search,
				categoria: categoria,
				estado: estado,
				cidade: cidade
			}, success: function(retorno){
				if(retorno.status == 'ok'){
					var html = '<ul class="list-group">';
					$.each(retorno.results, function(i, value){
						html += '<li class="list-group-item">';
						html += '<p>';
						html += '<a href="#"><h3 class="list-group-item-heading">'+value.titulo+'</h3></a>';
						html += '<strong>Retirada:</strong> '+value.retirada+'<br/>';
						html += '<strong>Entrega:</strong> '+value.entrega+'<br/>';
						html += '<strong>Criado em:</strong> '+value.created_at+'<br/>';
						html += '</p>';
						html += '</li>';
					});
					html += '</ul>';
					$('#resultados').html(html);
				}else{
					$('#resultados').html("Nenhum anúncio encontrado");
				}
			}, error: function(e){
				console.log(e);
			}
		})
	});

	$('.subcategorias').ready(function(){
		var categoria = localStorage.getItem("categoria");
		$.ajax({
			type: 'POST',
			url: url+'sys/Categoria/subcategoria',
			dataType: 'json',
			data: {
				categoria: categoria
			}, success: function(retorno){
				if(retorno.status == 'ok'){
					$.each(retorno.results, function(i, value){
						$(".subcategorias").append("<div class='col-md-3 element gall mudancas isotope-item'><a class='plS' rel='prettyPhoto[gallery2]'><img class='img-responsive picsGall' src='"+url+"images/home/categorias/"+value.imagem+"' alt='pic2 Gallery'></a><div class='view project_descr center'><h3><a class='subcategoria' id='"+value.id+"' style='cursor:pointer;'>"+value.subcategoria+"</a></h3><ul><li><i class='fa fa-eye'></i>"+value.views+"</li></ul></div></div>");
					});
				}else{
					$(".subcategorias").html("<div class='col-md-12'>Nenhuma subcategoria disponivel</div>");
				}
			}, error: function(e){
				console.log(e);
			}
		})
	});
	
	$('.anuncios').ready(function(){
		$.ajax({
			type: 'POST',
			url: url+'sys/Cargas/anuncios',
			dataType: 'json',
			success: function(retorno){
				if(retorno.status == 'ok'){
					var html = '<ul class="list-group">';
					$.each(retorno.results, function(i, value){
						html += '<li class="list-group-item">';
						html += '<p>';
						html += '<a href="'+value.url+'anuncio/'+value.id+'"><h3 class="list-group-item-heading">'+value.titulo+'</h3></a>';
						html += '<strong>Retirada:</strong> '+value.retirada+'<br/>';
						html += '<strong>Entrega:</strong> '+value.entrega+'<br/>';
						html += '<strong>Criado em:</strong> '+value.created_at+'<br/>';
						html += '</p>';
						html += '</li>';
					});
					html += '</ul>';
					$('.anunciar').show();
					$('.anuncios').html(html);
				}else{
					$(".anuncios").html("<div class='container-box'><div class='content'><i class='fa fa-truck' aria-hidden='true'></i><p>Anuncie sua Carga</p><a class='anunciar' href='categoria'>Fazer anúncio</a></div></div>");
				}
			}, error: function(e){
				console.log(e);
			}
		});
	});

	$(".adicionar-item").click(function(){
		numitems++;
		var add = '<div class="item" id="'+numitems+'"><div class="col-md-12"><h3>Item '+numitems+'</h3></div><div class="col-md-12"><label>Nome do Item</label><input type="text" id="nome_'+numitems+'" class="form-control input-md" style="width:100%"></div><div class="col-md-3"><label>Comp</label><input type="text" id="comp_'+numitems+'" class="form-control input-md" style="width:100%"></div><div class="col-md-3"><label>Largura</label><input type="text" id="largura_'+numitems+'" class="form-control input-md" style="width:100%"></div><div class="col-md-3"><label>Altura</label><input type="text" id="altura_'+numitems+'" class="form-control input-md" style="width:100%"></div><div class="col-md-3"><div class="form-group"><label for="sel1">Medida</label><select class="form-control" id="sel1_'+numitems+'"><option>M</option><option>CM</option></select></div></div><div class="col-md-6"><label>Peso</label><input type="text" id="peso_'+numitems+'" class="form-control input-md"></div><div class="col-md-6"><label>Quantidade</label><input type="text" id="quantidade_'+numitems+'" class="form-control input-md"></div></div>';
		$(".items").append(add);
	});
	
	$("#carga").submit(function(e){
		e.preventDefault();
		
		var items = [];
		var anuncio = $("#anuncio").val();
		var retirada = $("#retirada").val();
		var entrega = $("#entrega").val();
		for(var i = 0; i < numitems; i++){
			items[i] = {
				nome: $("#nome_"+(i+1)).val(),
				comp: $("#comp_"+(i+1)).val(),
				largura: $("#largura_"+(i+1)).val(),
				altura: $("#altura_"+(i+1)).val(),
				medida: $("#sel1_"+(i+1)).val(),
				peso: $("#peso_"+(i+1)).val(),
				quantidade: $("#quantidade_"+(i+1)).val()
			};
		}
		
		$.ajax({
			type: 'POST',
			url: url+'sys/Cargas/register',
			dataType: 'json',
			data: {
				items: items,
				anuncio: anuncio,
				retirada: retirada,
				entrega: entrega,
				categoria: localStorage.getItem("categoria"),
				subcategoria: localStorage.getItem("subcategoria")
			}, success: function(retorno){
				console.log(retorno);
				if(retorno == true){
					location.href = url+'successcarga';
				}else{
					$("#feedback").html("<div style='color:red;'>Ocorreu um erro, tente novamente mais tarde");
					hidemessage("#feedback");
				}
			}, error: function(e){
				console.log(e);
			}
		});
		
		return false;
	});

	$(document).on('click', '.categoria', function(e){
		e.preventDefault();
		
		var categoria = $(this).attr("id");
		localStorage.setItem("categoria", categoria);
		window.location.href = url+'subcategoria/';
		
		return false;
	});

	$(document).on('click', '.subcategoria', function(e){
		e.preventDefault();
		
		var subcategoria = $(this).attr('id');
		localStorage.setItem("subcategoria", subcategoria);
		window.location.href = url+'carga/';
		
		return false;
	});

	$('#logar').submit(function(e){
		e.preventDefault();
		
		var login = $("#login").val();
		var password = $("#password").val();
		
		if(login == "" || password == ""){
			$("#feedback").html("<div style='color:red;'>Você deve informar Login e Senha</div>");
			hidemessage("#feedback");
			return false;
		}
		
		$.ajax({
			type: 'POST',
			url: url+'sys/User/login',
			dataType: 'json',
			data: {
				login: login,
				password: password
			}, success: function(retorno){
				console.log(retorno);
				if(retorno.status == 'ok'){
					localStorage.setItem("id_user", retorno.id_user);
					location.href=url;
				}else{
					$("#feedback").html("<div style='color:red;'>Login ou Senha Incorretos</div>");
					hidemessage("#feedback");
				}
			}, error: function(e){
				console.log(e);
			}
		})
		
		return false;
	});

	$("#carga").submit(function(e){
		e.preventDefault();
		
		var items = [];
		
		return false;
	})

	$("#cliente").submit(function(e){
		e.preventDefault();
		
		var firstname = $("#firstname").val();
		var lastname = $("#lastname").val();
		var cpf = $("#cpf").val();
		var email = $("#email").val();
		var telefone = $("#telefone").val();
		var celular = $("#celular").val();
		var password = $("#password").val();
		var confpass = $("#confpass").val();
		
		if(password != confpass){
			$("#feedback").html("<div style='color:red;'>As senhas não estão conferindo</div>");
			hidemessage("#feedback");
			return false;
		}
		
		$.ajax({
			type: 'POST',
			url: url+'sys/User/register',
			dataType: 'json',
			data: {
				type: 1,
				firstname: firstname,
				lastname: lastname,
				cpf: cpf,
				email: email,
				telefone: telefone,
				celular: celular,
				password: password
			}, success: function(retorno){
				if(retorno.status == 'ok'){
					localStorage.setItem("id_user", retorno.id_user);
					location.href='success';
				}else{
					$("#feedback").html("<div style='color:red;'>Ocorreu um erro, tente novamente mais tarde</div>");
					hidemessage("#feedback");
				}
			}, error: function(e){
				console.log(e);
			}
		})
		
		return false;
	});

	$("#transportadora").submit(function(e){
		e.preventDefault();
		
		var firstname = $("#firstname").val();
		var lastname = $("#lastname").val();
		var cnpj = $("#cnpj").val();
		var email = $("#email").val();
		var telefone = $("#telefone").val();
		var celular = $("#celular").val();
		var password = $("#password").val();
		var confpass = $("#confpass").val();

		if(firstname == "" || lastname == "" || cnpj == "" || email == "" || telefone == "" || celular == "" || password == "" || confpass == ""){
			$("#feedback").html("<div style='color:red;'>Você deve preencher todos os campos</div>");
			hidemessage("#feedback");
			return false;
		}
		
		if(password != confpass){
			$("#feedback").html("<div style='color:red;'>As senhas não estão conferindo</div>");
			hidemessage("#feedback");
			return false;
		}
		
		$.ajax({
			type: 'POST',
			url: url+'sys/User/register',
			dataType: 'json',
			data: {
				type: 2,
				firstname: firstname,
				lastname: lastname,
				cpf: cnpj,
				email: email,
				telefone: telefone,
				celular: celular,
				password: password
			}, success: function(retorno){
				console.log(retorno);
				if(retorno.status == 'ok'){
					localStorage.setItem("id_user", retorno.id_user);
					location.href='categoriaTransp';
				}else{
					$("#feedback").html("<div style='color:red;'>Ocorreu um erro, tente novamente mais tarde</div>");
					hidemessage("#feedback");
				}
			}, error: function(e){
				console.log(e);
			}
		})
		
		return false;
	});

	$("#forgot").submit(function(e){
		e.preventDefault();
		
		var email = $("#email").val();
		
		$.ajax({
			type: 'POST',
			url: url+'sys/User/forgot',
			dataType: 'json',
			data: {
				email: email
			}, success: function(retorno){
				console.log(retorno);
				if(retorno.status == 'ok'){
					location.href='send';
				}else{
					$("#feedback").html("<div style='color:red;'>Ocorreu um erro, tente novamente mais tarde</div>");
					hidemessage("#feedback");
				}
			}, error: function(e){
				console.log(e);
			}
		});
		
		return false;
	});

	$("#resetpassword").submit(function(e){
		e.preventDefault();
		
		var password = $("#password").val();
		var confpass = $("#confpass").val();
		current = current.split("/")[5];

		if(password == "" || confpass == ""){
			$("#feedback").html("<div style='color:red;'>Você deve preencher todos os campos</div>");
			hidemessage("#feedback");
			return false;
		}
		
		if(password != confpass){
			$("#feedback").html("<div style='color:red;'>As senhas não estão conferindo</div>");
			hidemessage("#feedback");
			return false;
		}
		
		$.ajax({
			type: 'POST',
			url: url+'sys/User/resetPassword',
			dataType: 'json',
			data: {
				password: password,
				current: current
			}, success: function(retorno){
				console.log(retorno);
				if(retorno.status == 'ok'){
					location.href=url+'login';
				}else{
					$("#feedback").html("<div style='color:red;'>Ocorreu um erro, tente novamente mais tarde</div>");
					hidemessage("#feedback");
				}
			}, error: function(e){
				console.log(e);
			}
		})
		
		return false;
	});
	
	$("#categoria_transp").submit(function(e){
		e.preventDefault();
		
		var categorias = verifyCategorias();
		
		if(categorias == ""){
			$("#feedback").html("<div style='color:red;'>Você deve escolher ao menos uma categoria</div>");
				hidemessage("#feedback");
			return false;
		}
		
		$.ajax({
			type: 'POST',
			url: url+'sys/User/defineCategorias',
			dataType: 'json',
			data: {
				categorias: categorias
			}, success: function(retorno){
				if(retorno == true){
					location.href=url+'successtransportadora';
				}else{
					$("#feedback").html("<div style='color:red;'>Ocorreu um erro, tente novamente mais tarde</div>");
					hidemessage("#feedback");
				}
			}, error: function(e){
				console.log(e);
			}
		});
		
		return false;
	});

	$("#addmotorista").submit(function(e){
		e.preventDefault();

		var firstname = $("#firstname").val();
		var lastname = $("#sobrenome").val();
		var rg = $("#rg").val();
		var oe = $("#orgao").val();
		var cpf = $("#cpf").val();
		var nregistro = $("#nregistro").val();
		var cathab = $("#cathab").val();
		var validade = $("#validade").val();

		$.ajax({
			type: 'POST',
			url: url+'sys/Motorista/register',
			dataType: 'json',
			data: {
				firstname: firstname,
				lastname: lastname,
				rg: rg,
				oe: oe,
				cpf: cpf,
				nregistro: nregistro,
				cathab: cathab,
				validade: validade
			}, success: function(retorno){
				console.log(retorno);
				if(retorno == false){
					$("#feedback").html("<div style='color:red;'>Ocorreu um erro, tente novamente mais tarde</div>");
					hidemessage("#feedback");
				}else{
					$("#add").modal('hide');
				}
			}, error: function(e){
				console.log(e);
			}
		})

		return false;
	});

	$(".motoristas").ready(function(){
		$.ajax({
			type: 'POST',
			url: url+'sys/Motorista/load',
			dataType: 'json',
			beforeSend: function(){
				$(".motoristas .box-body").html("<h4>Carregando...</h4>");
			},
			success: function(retorno){
				if(retorno.status == 'ok'){
					var html = "<ul class='list-group'>";
					$.each(retorno.results, function(i, value){
						html += "<li class='list-group-item' id='motorista_"+value.id+"'>";
						html += "<h4 class='list-group-item-heading' style='text-align:left !important;'>"+value.firstname+" "+value.lastname+"</h4>";
						html += "<a class='delete' id='"+value.id+"'><span class='glyphicon glyphicon-trash'></span></a>";
						html += "<p>";
						html += "RG "+value.rg+"<br>";
						html += "Registro "+value.registro+"<br>";
						html += "Validade "+value.validade+"<br>";
						html += "</p>";
						html += "</li>";
					});
					html += "</ul>";
					$(".motoristas .box-body").html(html);
				}else{
					$(".box-body").html("<h4>Não há motoristas cadastrados</h4>");
				}
			}, error: function(e){
				console.log(e);
			}
		});
	});

	$(document).on("click", ".delete", function(e){
		e.preventDefault();

		if(confirm("Tem certeza que deseja excluir esse motorista?") == false){
			return false;
		}

		var motorista = $(this).attr("id");

		$.ajax({
			type: 'POST',
			url: url+'sys/Motorista/delete',
			dataType: 'json',
			data: {
				motorista: motorista
			}, success: function(retorno){
				if(retorno == true){
					$("#motorista_"+motorista).fadeOut();
				}else{
					$("#feedback_d").html("<div style='color:red;'>Ocorreu um erro, tente novamente mais tarde</div>");
					hidemessage("#feedback_d");
				}
			}, error: function(e){
				console.log(e);
			}
		});


		return false;
	});

	$("#registermotorista").click(function(e){
		e.preventDefault();

		$("#addmotorista").submit();

		return false;
	});

});
