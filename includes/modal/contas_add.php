<form action="#" role="form">
	<div class="container">
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingOne">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							1 - Dados da Conta
						</a>
					</h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
					<div class="panel-body">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="conta">Conta</label>
										<input type="text" id="conta" name="conta" class="form-control" placeholder="Conta">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="valor">Valor (R$)</label>
										<input type="text" id="valor" name="valor" class="form-control" placeholder="Valor (R$)">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="valor_disponivel">Valor Disponível (R$)</label>
										<input type="text" id="valor_disponível" name="valor_disponível" readonly="readonly" class="form-control" placeholder="Valor Disponível (R$)">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-8">
									<div class="form-group">
										<label for="pasta_servidor">Pasta no servidor</label>
										<input type="text" id="pasta_servidor" name="pasta_servidor" class="form-control" placeholder="Pasta no servidor">
									</div>
								</div>
								<div class="col-md-4">
									<div class="pull-right">
										<p>&nbsp;</p>
										<button class="btn btn-success">Salvar e continuar <span class="glyphicon glyphicon-chevron-right"></span></button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingTwo">
					<h4 class="panel-title">
						<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							2 - Dados Processo
						</a>
					</h4>
				</div>
				<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
					<div class="panel-body">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="processo">Processo</label>
										<input type="text" id="processo" name="processo" class="form-control" placeholder="Processo">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="vara">Vara</label>
										<select name="vara" id="vara" class="form-control">
											<option value="0">Selecione a vara</option>
											<?php 
												for($i = 1; $i <= 10; $i++){
													echo('<option value="'.$i.'">'.$i.'</option>');
												}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="comarca">Comarca</label>
										<select name="comarca" id="comarca" class="form-control">
											<option value="0">Selecione a comarca</option>
											<?php

											?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="autor">Autor</label>
										<div class="input-group">
											<input type="text" id="autor" name="autor" class="form-control" placeholder="Autor">
											<span class="input-group-btn">
	                                        	<a class="btn btn-default" title="Incluir autor">
	                                        	    <span class="glyphicon glyphicon-plus-sign"></span>
	                                        	</a>
	                                    	</span>
	                                	</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<input type="text" id="autor" name="autor" class="form-control" placeholder="Autor">
											<span class="input-group-btn">
	                                        	<a class="btn btn-default" title="Remover autor">
	                                        	    <span class="glyphicon glyphicon-minus-sign"></span>
	                                        	</a>
	                                    	</span>
	                                	</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="reu">Réu</label>
										<div class="input-group">
											<input type="text" id="reu" name="reu" class="form-control" placeholder="reu">
											<span class="input-group-btn">
	                                        	<a class="btn btn-default" title="Incluir réu">
	                                        	    <span class="glyphicon glyphicon-plus-sign"></span>
	                                        	</a>
	                                    	</span>
	                                	</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<input type="text" id="reu" name="reu" class="form-control" placeholder="reu">
											<span class="input-group-btn">
	                                        	<a class="btn btn-default" title="Remover réu">
	                                        	    <span class="glyphicon glyphicon-minus-sign"></span>
	                                        	</a>
	                                    	</span>
	                                	</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-8">&nbsp;</div>
								<div class="col-md-4">
									<div class="pull-right">
										<button class="btn btn-success">Salvar e continuar <span class="glyphicon glyphicon-chevron-right"></span></button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingThree">
					<h4 class="panel-title">
						<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							3 - Advogados
						</a>
					</h4>
				</div>
				<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
					<div class="panel-body">
						<div class="container-fluid">
							<div class="row">
								<table id="table-methods-table" data-toggle="table" data-url="includes/db/list.php?type=advogados" data-cache="false" 
                  					   data-click-to-select="true" data-show-refresh="false"
                  					   data-show-columns="false" data-search="false" data-select-item-name="toolbar1"
                  					   data-show-toggle="false" data-pagination="true">
									<thead>
									<tr>
										<th data-field="state" data-checkbox="true" data-halign="center" data-align="center"></th>
										<th data-field="id" data-visible="false" data-halign="center" data-align="center">Item ID</th>
										<th data-field="name" data-halign="center" data-align="center" data-sortable="true">Nome</th>
										<th data-field="oab" data-halign="center" data-align="center" data-sortable="true">OAB</th>
										<th data-field="oabuf" data-halign="center" data-align="center" data-sortable="true">OAB UF</th>
										<th class="mask_cpf" data-field="cpf" data-field="cpf" data-halign="center" data-align="center" data-sortable="true">CPF</th>
										<th class="mask_phone" data-field="phone" data-halign="center" data-align="center" data-sortable="true">Telefone</th>
										<th class="mask_phone" data-field="cellphone" data-halign="center" data-align="center" data-sortable="true">Celular</th>
										<th data-field="email" data-halign="center" data-align="center" data-sortable="true">E-mail</th>
										<th class="mask_cep" data-field="cep" data-visible="false" data-halign="center" data-align="center" data-sortable="true">CEP</th>
										<th data-field="address" data-visible="false" data-halign="center" data-align="center" data-sortable="true">Endere&#231;o</th>
										<th data-field="number" data-visible="false" data-halign="center" data-align="center" data-sortable="true">N&#250;mero</th>
										<th data-field="complement" data-visible="false" data-halign="center" data-align="center" data-sortable="true">Complemento</th>
										<th data-field="neighborhood" data-visible="false" data-halign="center" data-align="center" data-sortable="true">Bairro</th>
										<th data-field="city" data-visible="false"  data-halign="center" data-align="center" data-sortable="true">Cidade</th>
										<th data-field="state" data-halign="center" data-align="center" data-sortable="true">Estado</th>
										<!--<th data-field="operate" data-formatter="operateFormatter" data-events="operateEvents" data-halign="center" data-align="center">A&ccedil;&otilde;es</th>-->
									</tr>
									</thead>
								</table>
							</div>
							<div class="row">
								<div class="col-md-6">
									
								</div>
								<div class="col-md-6">
									<div class="pull-right">
										<!-- Split button -->
										<div class="btn-group">
											<button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-import"></span> Associar advogados</button>
											<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<span class="caret"></span>
											<span class="sr-only">Toggle Dropdown</span>
											</button>
											<ul class="dropdown-menu" role="menu">
											<li><a href="#"><span class="glyphicon glyphicon-export"></span> Retirar associação</a></li>
											<li class="divider"></li>
											<li><a href="#"><span class="glyphicon glyphicon-plus"></span> Novo advogado</a></li>
											<li><a href="#"><span class="glyphicon glyphicon-edit"></span> Editar selecionado</a></a></li>
											
											</ul>
										</div>
										<button class="btn btn-success">Salvar e continuar <span class="glyphicon glyphicon-chevron-right"></span></button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingFour">
					<h4 class="panel-title">
						<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
							4 - Documentos
						</a>
					</h4>
				</div>
				<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
					<div class="panel-body">
						Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
					</div>
				</div>
			</div>
		</div>
	</div>
</form>