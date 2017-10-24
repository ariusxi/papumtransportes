<hr/>
<form action='' method='post' id='logar' enctype='multipart/form-data'>
	<div class='container'>
		<div class='row'>
			<div class='col-md-12' id='feedback'></div>
			<div class='col-md-12'>
				<label>CPF ou E-mail</label>
				<input type='text' name='login' class='form-control' id='login' placeholder='Digite seu CPF ou E-mail'/>
			</div>
			<div class='col-md-12'>
				<label>Senha</label>
				<input type='password' name='password' class='form-control' id='password' placeholder='Digite sua Senha'/>
			</div>
			<div class='col-md-12'>
				<br>
				<input type='submit' class='btn btn-default' value='Entrar'/>
				<a href='<?php echo BASE; ?>register' class='btn btn-default'>Cadastre-se</a>
				<a href='<?php echo BASE; ?>forgot'>Esqueci minha senha</a>
			</div>
		</div>
	</div>
</form>
<hr/>