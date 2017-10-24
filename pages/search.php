<div class="container" style="margin-top:30px;">
	<div class="row">
		<div class="col-md-4">
			<div class="panel-group">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" href="#collapse1">Categoria</a>
						</h4>
					</div>
					<div id="collapse1" class="panel-collapse collapse" style="display:block;">
						<ul class="list-group" style="margin-bottom:0px !important;">
							<li class="list-group-item">
								<input type="radio" name="categoria_1" value="1">
								Mudanças
							</li>
							<li class="list-group-item">
								<input type="radio" name="categoria_2" value="2">
								Artigos Domesticos
							</li>
							<li class="list-group-item">
								<input type="radio" name="categoria_3" value="3">
								Cargas
							</li>
						
							<li class="list-group-item">
								<input type="radio" name="categoria_4" value="4">
								Veiculos
							</li>
				
						</ul>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" href="#collapse2">Estado</a>
						</h4>
					</div>
					<div id="collapse2" class="panel-collapse collapse" style="display:block;">
						<ul class="list-group" style="margin-bottom:0px !important;">
							<li class="list-group-item">
								<input type="radio" name="estado_1" value="São Paulo">
								São Paulo
							</li>
							<li class="list-group-item">
								<input type="radio" name="estado_2" value="Minas Gerais">
								Minas Gerais
							</li>
							<li class="list-group-item">
								<input type="radio" name="estado_3" value="Rio de Janeiro">
								Rio de Janeiro
							</li>
							<li class="list-group-item">
								<input type="radio" name="estado_4" value="Santa Catarina">
								Santa Catarina
							</li>
						</ul>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" href="#collapse3">Cidade</a>
						</h4>
					</div>
					<div id="collapse3" class="panel-collapse collapse" style="display:block;">
						<ul class="list-group" style="margin-bottom:0px !important;">
							<li class="list-group-item">
								<input type="radio" name="cidade_1" value="São Paulo">
								São Paulo
							</li>
							<li class="list-group-item">
								<input type="radio" name="cidade_2" value="Osasco">
								Osasco
							</li>
							<li class="list-group-item">
								<input type="radio" name="cidade_3" value="Alphaville">
								Alphaville
							</li>
							<li class="list-group-item">
								<input type="radio" name="cidade_4" value="Barueri">
								Barueri
							</li>
						</ul>
					</div>
					<div class="panel-footer">
						<button type="button" class="btn btn-primary filter">Aplicar filtros +</button>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<form action="" method="post" id="search" enctype="multipart/form-data">
				<h2>Resultados para <?php echo $explode[1]; ?></h2>
                <div class="input-group col-md-12">
                    <input type="text" class="form-control input-lg" id="query" placeholder="Buscar" value="<?php echo $explode[1]; ?>" required="required"/>
                    <div class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                </div>
			</form><br>
			<div id="resultados"></div>
		</div>
	</div>
</div>