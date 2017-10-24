<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<hr/>
<form action='' id='cliente' method='' enctype='multipart/form-data'>
	<div class='container'>
		<div class='row'>
			<div class='col-md-12'>
				<h2>Cadastro de Cliente</h2>
			</div>
			<div id="feedback" class='col-md-12'></div>
			<div class='col-md-6'>
				<label>Nome</label>
				<input type='text' name='firstname' id='firstname' class='form-control' placeholder='Digite seu Nome' required="required"/><br>
			</div>
			<div class='col-md-6'>
				<label>Sobrenome</label>
				<input type='text' name='lastname' id='lastname' class='form-control' placeholder='Digite seu Sobrenome' required="required"/><br>
			</div>
			<div class='col-md-4'>
				<label>CPF</label>
				<input type='text' name='cpf' id='cpf' class='form-control' placeholder='Digite seu CPF' required="required" maxlength="11" /><br>
			</div>
			<div class='col-md-4'>
				<label>E-mail</label>
				<input type='email' id='email' name='email' class='form-control' placeholder='Digite seu E-mail' required='required'/><br>
			</div>
			<div class='col-md-4'>
				<label>Telefone</label>
				<input type='text' name='telefone' id='telefone' class='form-control' placeholder='Digite seu Telefone' required="required"/><br>
			</div>
			<div class='col-md-12'>
				<label>Celular</label>
				<input type='text' name='celular' id='celular' class='form-control' placeholder='Digite seu Celular' required="required"/><br>
			</div>
			<div class='col-md-6'>
				<label>Senha</label>
				<input type='password' name='password' id='password' class='form-control' placeholder='Digite sua Senha' required="required"/><br>
			</div>
			<div class='col-md-6'>
				<label>Confirmar Senha</label>
				<input type='password' name='confpass' id='confpass' class='form-control' placeholder='Confirme sua Senha' required="required"/><br>
			</div>
			<div class='col-md-12'>
				<div class="g-recaptcha" data-sitekey="Le2FzIUAAAAAHHOBzmLeIr-PgsJJi89mT5nNqf7"></div><br>
			</div>
			<div class='col-md-12'>
				<input type='submit' class='btn btn-default' value='Cadastrar'/>
				<a href='register'>Voltar</a>
			</div>
		</div>
	</div>
</form>
<hr/>