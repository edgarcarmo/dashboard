<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
	<h4 class="modal-title">Advogado</h4>
</div>
<form role="form" action="includes/db/add.php" method="post" id="add_sumbit" data-toggle="validator">
	<div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Dados Cadastrais</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="oab">OAB</label>
									<input type="text" id="oab" name="oab" class="form-control" placeholder="OAB" required/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="oabuf">Estado OAB</label>
									<select name="oabuf" id="oabuf" name="oabuf" class="form-control" required>
										<option value="" selected="selected">Selecione o Estado</option>
										<option value="AC">Acre</option>
										<option value="AL">Alagoas</option>
										<option value="AM">Amazonas</option>
										<option value="AP">Amapá</option>
										<option value="BA">Bahia</option>
										<option value="CE">Ceará</option>
										<option value="DF">Distrito Federal</option>
										<option value="ES">Espírito Santo</option>
										<option value="GO">Goiás</option>
										<option value="MA">Maranhão</option>
										<option value="MT">Mato Grosso</option>
										<option value="MS">Mato Grosso do Sul</option>
										<option value="MG">Minas Gerais</option>
										<option value="PA">Pará</option>
										<option value="PB">Paraíba</option>
										<option value="PR">Paraná</option>
										<option value="PE">Pernambuco</option>
										<option value="PI">Piauí</option>
										<option value="RJ">Rio de Janeiro</option>
										<option value="RN">Rio Grande do Norte</option>
										<option value="RO">Rondônia</option>
										<option value="RS">Rio Grande do Sul</option>
										<option value="RR">Roraima</option>
										<option value="SC">Santa Catarina</option>
										<option value="SE">Sergipe</option>
										<option value="SP">São Paulo</option>
										<option value="TO">Tocantins</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<div class="form-group">
									<label for="cpf">CPF</label>
									<input type="text" id="cpf" name="cpf" pattern="[0-9]{3}[\.]?[0-9]{3}[\.]?[0-9]{3}[-]?[0-9]{2}" class="form-control mask_cpf" placeholder="CPF" required/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="name">Nome</label>
									<input type="text" id="name" name="name" class="form-control" placeholder="Nome completo" required/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="phone">Telefone</label>
									<input type="text" id="phone" name="phone" class="form-control mask_phone" placeholder="Telefone" pattern="\([0-9]{2}\)\s[0-9]{4}-[0-9]{4,5}"/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="cellphone">Celular</label>
									<input type="text" id="cellphone" name="cellphone" class="form-control mask_phone" placeholder="Celular" pattern="\([0-9]{2}\)\s[0-9]{4}-[0-9]{4,5}"/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="email">E-mail</label>
									<input type="email" id="email" name="email" class="form-control" placeholder="E-mail" required/>
								</div>
							</div>
						</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Endereço</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="cep">CEP</label>
									<div class="input-group">
										<input type="text" id="cep" name="cep" class="form-control mask_cep"/>
										<span class="input-group-btn">
	                                        <a class="btn btn-default" title="Localizar endereço" onclick="consultarCEP($('#cep').val())">
	                                            <span class="glyphicon glyphicon-search"></span>
	                                        </a>
	                                    </span>
	                                </div>
								</div>
							</div>
							<div class="col-md-8">
								&nbsp;
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label for="address">Endereço</label>
									<input type="text" id="address" name="address" class="form-control" />
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="number">Número</label>
									<input type="text" id="number" name="number" class="form-control"/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="complement">Complemento</label>
									<input type="text" id="complement" name="complement" class="form-control"/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="neighborhood">Bairro</label>
									<input type="text" id="neighborhood" name="neighborhood" class="form-control"/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="city">Cidade</label>
									<input type="text" id="city" name="city" class="form-control"/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="state">Estado</label>
									<select name="state" id="state" class="form-control">
										<option value="" selected="selected">Selecione o Estado</option>
										<option value="AC">Acre</option>
										<option value="AL">Alagoas</option>
										<option value="AM">Amazonas</option>
										<option value="AP">Amapá</option>
										<option value="BA">Bahia</option>
										<option value="CE">Ceará</option>
										<option value="DF">Distrito Federal</option>
										<option value="ES">Espírito Santo</option>
										<option value="GO">Goiás</option>
										<option value="MA">Maranhão</option>
										<option value="MT">Mato Grosso</option>
										<option value="MS">Mato Grosso do Sul</option>
										<option value="MG">Minas Gerais</option>
										<option value="PA">Pará</option>
										<option value="PB">Paraíba</option>
										<option value="PR">Paraná</option>
										<option value="PE">Pernambuco</option>
										<option value="PI">Piauí</option>
										<option value="RJ">Rio de Janeiro</option>
										<option value="RN">Rio Grande do Norte</option>
										<option value="RO">Rondônia</option>
										<option value="RS">Rio Grande do Sul</option>
										<option value="RR">Roraima</option>
										<option value="SC">Santa Catarina</option>
										<option value="SE">Sergipe</option>
										<option value="SP">São Paulo</option>
										<option value="TO">Tocantins</option>
									</select>
								</div>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">&nbsp;</div>
            <div class="col-md-4">
                <div class="pull-right">
                    <button type="button" class="btn btn-default btn_cancel" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </div>
        </div>
    </div>
   <input type="hidden" name="type" value="advogados"/>
</form>
<script src="js/functions_modal.js"></script>