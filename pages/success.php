<?php
	if(!isset($_SESSION['id_user'])){
		echo "<h2>ERRO 200</h2><p>Você não tem permissão para acessar essa página</p>";
		exit;
	}
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>Cadastro efetuado com sucesso</h3>
			<p>Foi enviada uma confirmação de email para <?php echo $logado->email; ?></p>
		</div>
	</div>
</div>