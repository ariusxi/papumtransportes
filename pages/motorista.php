<div class='menu'>
	<div class='container'>
		<div class="row">
			<div class="col-md-12">
				<ul class='left-menu'>
					<li><a href='profile'>Caixa de Entrada</a></li>
					<li><a href='motorista'>Motoristas</a></li>
					<li><a href=''>Pagamentos</a></li>
					<li><a href='' style="border-right:none !important;">Cadastro de Veículos</a></li>
				</ul>
				<ul class='right-menu'>
					<li><a href=''>Meus Transportes</a></li>
					<li><a href='' style="border-right:none !important;">Achar cargas</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div id="add" class="modal fade" role="dialog">
 	<div class="modal-dialog">	
	    <div class="modal-content" style='width:1180px;margin-left:-250px'>
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<h4 class="modal-title">Cadastro de Motorista</h4>
	      	</div>
	      	<div class="modal-body">
	      		<form action="" method="post" id="addmotorista" enctype="multipart/form-data">
		        	<div class="row">
						<div class='col-md-offset-2 col-md-4'>
							<label>Nome:</label>
							<input type='text' name='firstname' id='firstname' class='form-control' placeholder='Digite seu Nome' required="required"/><br>
						</div>
						<div class='col-md-4'>
							<label>Sobrenome</label>
							<input type='text' name='sobrenome' id='sobrenome' class='form-control' placeholder='Digite seu sobrenome' required='required'/><br>
						</div>
						<div class='col-md-offset-2 col-md-4'>
							<label>RG</label>
							<input type='text' name='rg' id='rg' class='form-control' placeholder='XXXXXXXXX' required='required' maxlength="9" /><br>

						</div>
						<div class="col-md-2">
							<label>Orgão Emissor</label>
							<input type='text' name='orgao' id='orgao' class='form-control' placeholder='OE' required='required' maxlength="2"/><br>

						</div>
						<div class="col-md-2">
							<label>CPF</label>
							<input type='text' name='cpf' id='cpf' class='form-control' placeholder='XXX.XXX.XXX-XX' required="required" maxlength="11" /><br>
						</div>

						<hr>
						
						<div class='col-md-offset-2 col-md-4'>
							<label>Nº Registro</label>
							<input type='text' name='nregistro' id='nregistro' class='form-control' placeholder='000000000000' maxlength="12"/><br>
						</div>
						<div class='col-md-2'>
							<label for="sel1">Cat Hab</label>
			  				<select class="form-control" id="cathab" required="required">
							    <option>A</option>
							    <option>B</option>
							    <option>C</option>
							    <option>D</option>
							    <option>E</option>
							    <option>ACC</option>
			 			 	</select>
						</div>
						<div class='col-md-2'>
							<label>Validade</label>
							<div class='input-group date' id='datetimepicker1'>
			                    <input type='date' class="form-control" id="validade"/>
			                    <span class="input-group-addon">
			                        <span class="glyphicon glyphicon-calendar"></span>
			                    </span>
			                </div>
						        <script type="text/javascript">
						            $(function () {
						                $('#datetimepicker1').datetimepicker();
						            });
						        </script>
						</div>
						<div class='col-md-12' id='feedback'>
						</div>
					</div>
				</form>
	      	</div>
	      	<div class="modal-footer">
	      		<a class="btn-new" id="registermotorista">Cadastrar</a>
	        	<a class="btn-new" data-dismiss="modal">Voltar</a>
	      	</div>
	    </div>
 	</div>
</div>
<div class='motoristas'>
	<div class='container'>
		<div class='row'>
			<div class='col-md-12' style='margin-top:10px;'>
				<h4 style='float:left;'>Motoristas</h4>
				<a class='btn-new' style='float:right;' data-toggle="modal" data-target="#add">Cadastrar Novo Motorista</a>
			</div>
			<div class='col-md-12' id='feedback_d'>
			</div>
			<div class='col-md-12'>
				<div class="box-message">
					<div class="box-header">
						<label>Motoristas cadastrados:</label>
					</div>
					<div class="box-body">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>