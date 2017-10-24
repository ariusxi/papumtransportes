<?php
	if(!isset($_SESSION['id_user'])){
		echo "<h2>ERRO 200</h2><p>Você não tem permissão para acessar essa página</p>";
		exit;
	}
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>Seleciona a subcategoria da carga</h3>
		</div>
		<div class="row columns4 pretty isotope subcategorias" data-animated="fadeIn">
			
		</div>
	</div>
</div>