<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<hr/>
<form action='' id='transportadora' method='' enctype='multipart/form-data'>
	<div class='container'>
		<div class='row'>
			<div class='col-md-12'>
				<h2>Cadastro de Transportadora</h2>
			</div>
			<div class='col-md-6'>
				<label>Nome</label>
				<input type='text' id='firstname' name='firstname' class='form-control' placeholder='Digite seu Nome' required='required'/><br>
			</div>
			<div class='col-md-6'>
				<label>Sobrenome</label>
				<input type='text' id='lastname' name='lastname' class='form-control' placeholder='Digite seu Sobrenome' required='required'/><br>
			</div>
			<div class='col-md-4'>
				<label>CNPJ</label>
				<input type='text' name='cnpj' id='cnpj' class='form-control'  maxlength='18' OnKeyPress='return SomenteNumero(this, event)' Onkeyup="FormataCnpj(this,event)" Onblur="validarCNPJ(this.value)" placeholder='Digite seu CNPJ' required="required" maxlength="18"/><br>
			</div>
			<div class='col-md-4'>
				<label>E-mail</label>
				<input type='email' id='email' name='email' class='form-control' placeholder='Digite seu E-mail' required='required'/><br>
			</div>
			<div class='col-md-4'>
				<label>Telefone</label>
				<input type='text' id='telefone' name='telefone' class='form-control' placeholder='Digite seu Telefone' required='required' maxlength="10"/><br>
			</div>
			<div class='col-md-12'>
				<label>Celular</label>
				<input type='text' name='celular' id='celular' class='form-control' placeholder='Digite seu Celular' required="required" maxlength="11"/><br>
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
				<div class="g-recaptcha" data-sitekey="Le2FzIUAAAAAHHOBzmLeIr-PgsJJi89mT5nNqf7"></div>
			</div>
			<div class='col-md-12'>
				<input type='submit' class='btn btn-default' value='Cadastrar'/>
				<a href='register'>Voltar</a>
			</div>
		</div>
	</div>	
</form>
<hr/>