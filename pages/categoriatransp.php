<?php
	if(!isset($_SESSION['id_user'])){
		echo "<h2>ERRO 200</h2><p>Você não tem permissão para acessar essa página</p>";
		exit;
	}
?>
<div class="container">
	<form action="" id="categoria_transp" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-12">
				<h3>Seleciona a categoria da carga</h3>
			</div>
			<div class="col-md-12">
				<ul class="list-group categorias_transp">
					
				</ul>
			</div>
			<div class="col-md-12" id="feedback"></div>
			<div class="col-md-12">
				<input type="submit" class="btn btn-default" value="Salvar"/>
			</div>
		</div>
	</div>
</div>