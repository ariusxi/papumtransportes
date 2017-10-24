<?php
	if(!isset($explode[1])){
		echo "<div class='container'><h3>Link invalido</h3></div>";
		exit;
	}else{
		require_once "classes/BD.class.php";
		$pega_codigo = @BD::conn()->prepare("SELECT id_user FROM forgotcodes WHERE code = ?");
		$pega_codigo->execute([$explode[1]]);
		if($pega_codigo->rowCount() == 0){
			echo "<h3>Link inválido</h3>";
			exit;
		}else{
			$fetch = $pega_codigo->fetchObject();
			$_SESSION['id_forgot'] = $fetch->id_user;
		}
	}
?>
<hr/>
<form action='' method='post' id='resetpassword' enctype='multipart/form-data'>
	<div class='container'>
		<div class='row'>
			<div class='col-md-12' id='feedback'></div>
			<div class='col-md-12'>
				<label>Nova Senha</label>
				<input type='password' id='password' class='form-control' name='password' placeholder='Digite sua Senha'/>
			</div>
			<div class='col-md-12'>
				<label>Nova Senha</label>
				<input type='password' id='confpass' class='form-control' name='confpass' placeholder='Confirme sua Senha'/><br>
			</div>
			<div class='col-md-12'>
				<input type='submit' value='Alterar' class='btn btn-default'/>
			</div>
		</div>
	</div>
</form>
<hr/>