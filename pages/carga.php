<?php
	/*if(!isset($_SESSION['id_user'])){
		echo "<h2>ERRO 200</h2><p>Você não tem permissão para acessar essa página</p>";
		exit;
	}*/
?>
<div class="container">
	<form class="form-horizontal" id="carga" method="post" enctype="multipart/form-data">
		<fieldset>
			<legend><h3>Cadastro de Carga</h3></legend>
			<div class="row forma">
				<div class='items'>
					<div class='item' id='1'>
						<div class="col-md-12">
							<h3>Item 1</h3>
						</div>
						<div class="col-md-12">
							<label>Nome do Item</label>
							<input type="text" id="nome_1" class="form-control input-md" style="width:100%" required="required">
						</div>
						<div class="col-md-3">
							<label>Comp</label>
							<input type="text" id="comp_1" class="form-control input-md" style="width:100%" required="required">
						</div>
						<div class="col-md-3">
							<label>Largura</label>
							<input type="text" id="largura_1" class="form-control input-md" style="width:100%" required="required">
						</div>
						<div class="col-md-3">
							<label>Altura</label>
							<input type="text" id="altura_1" class="form-control input-md" style="width:100%" required="required">
						</div>
						<div class="col-md-3">
							<div class="form-group">
							  	<label for="sel1">Medida</label>
							  	<select class="form-control" id="sel1_1" required="required">
									<option>M</option>
							  		<option>CM</option>
							  	</select>
							</div> 
						</div>
						<div class="col-md-6">
							<label>Peso</label>
							<input type="text" id="peso_1" class="form-control input-md" required="required">
						</div>
						<div class="col-md-6">
							<label>Quantidade</label>
							<input type="text" id="quantidade_1" class="form-control input-md" required="required">
						</div>
					</div>
				</div>
				<div class="col-md-8" style="margin-top:20px;">
					<button type="button" class="btn btn-default adicionar-item" style="width:100%">
						<span class="glyphicon glyphicon-plus"></span> Adicionar mais um item
					</button>
				</div>
				<div class="col-md-12">
					<hr style="border:0.0625rem solid #DDDDDD">
				</div>
				<div class="col-md-12">
					<h3>Título do Anúncio</h3>
					<input type="text" id="anuncio" class="form-control input-md" required="required">
				</div>
				<div class="col-md-12">
					<h3>Local de retirada</h3>
					<label>Cidade ou CEP</label>
					<input type="text" id="retirada" class="form-control input-md " required="required">
				</div>
				<div class="col-md-12">
					<h3>Local de entrega</h3>
					<label>Cidade ou CEP</label>
					<input type="text" id="entrega" class="form-control input-md " required="required">
				</div>
				<div class="col-md-12">
					<hr style="border:0.0625rem solid #DDDDDD">
				</div>
				<div class="col-md-12" id="feedback">
				</div>
				<div class="col-md-12">
					<button type="submit" class="btn btn-success btn-lg">Enviar</button>
				</div>
			</div>
		</fieldset>
	</form>
</div>