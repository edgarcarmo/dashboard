<?php
	$id = $_GET["id"];
	$oab = $_GET["oab"];
	$oabuf = $_GET["oabuf"];
	$name = $_GET["name"];
	$cpf = $_GET["cpf"];
	$phone = isset ($_GET['phone']) ? $_GET['phone'] : "";
	$cellphone = isset ($_GET['cellphone']) ? $_GET['cellphone'] : "";
	$email = isset ($_GET['email']) ? $_GET['email'] : "";
	$cep = isset ($_GET['cep']) ? $_GET['cep'] : "";
	$address = isset ($_GET['address']) ? $_GET['address'] : "";
	$number = isset ($_GET['number']) ? $_GET['number'] : "";
	$complement = isset ($_GET['complement']) ? $_GET['complement'] : "";
	$neighborhood = isset ($_GET['neighborhood']) ? $_GET['neighborhood'] : "";
	$city = isset ($_GET['city']) ? $_GET['city'] : "";
	$state = isset ($_GET['state']) ? $_GET['state'] : "";
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
	<h4 class="modal-title">Advogado</h4>
</div>
<form role="form" action="includes/db/edit.php" method="post" id="edit_sumbit" data-toggle="validator">
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
									<input type="text" id="oab" name="oab" class="form-control" placeholder="OAB" required value="<?php echo $oab; ?>"/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="oabuf">Estado OAB</label>
									<select name="oabuf" id="oabuf" name="oabuf" class="form-control" required>
										<option value="" selected="selected">Selecione o Estado</option>
										<option value="AC" <?php echo $oabuf=='AC'?'selected':'';?>>Acre</option>
										<option value="AL" <?php echo $oabuf=='AL'?'selected':'';?>>Alagoas</option>
										<option value="AM" <?php echo $oabuf=='AM'?'selected':'';?>>Amazonas</option>
										<option value="AP" <?php echo $oabuf=='AP'?'selected':'';?>>Amapá</option>
										<option value="BA" <?php echo $oabuf=='BA'?'selected':'';?>>Bahia</option>
										<option value="CE" <?php echo $oabuf=='CE'?'selected':'';?>>Ceará</option>
										<option value="DF" <?php echo $oabuf=='DF'?'selected':'';?>>Distrito Federal</option>
										<option value="ES" <?php echo $oabuf=='ES'?'selected':'';?>>Espírito Santo</option>
										<option value="GO" <?php echo $oabuf=='GO'?'selected':'';?>>Goiás</option>
										<option value="MA" <?php echo $oabuf=='MA'?'selected':'';?>>Maranhão</option>
										<option value="MT" <?php echo $oabuf=='MT'?'selected':'';?>>Mato Grosso</option>
										<option value="MS" <?php echo $oabuf=='MS'?'selected':'';?>>Mato Grosso do Sul</option>
										<option value="MG" <?php echo $oabuf=='MG'?'selected':'';?>>Minas Gerais</option>
										<option value="PA" <?php echo $oabuf=='PA'?'selected':'';?>>Pará</option>
										<option value="PB" <?php echo $oabuf=='PB'?'selected':'';?>>Paraíba</option>
										<option value="PR" <?php echo $oabuf=='PR'?'selected':'';?>>Paraná</option>
										<option value="PE" <?php echo $oabuf=='PE'?'selected':'';?>>Pernambuco</option>
										<option value="PI" <?php echo $oabuf=='PI'?'selected':'';?>>Piauí</option>
										<option value="RJ" <?php echo $oabuf=='RJ'?'selected':'';?>>Rio de Janeiro</option>
										<option value="RN" <?php echo $oabuf=='RN'?'selected':'';?>>Rio Grande do Norte</option>
										<option value="RO" <?php echo $oabuf=='RO'?'selected':'';?>>Rondônia</option>
										<option value="RS" <?php echo $oabuf=='RS'?'selected':'';?>>Rio Grande do Sul</option>
										<option value="RR" <?php echo $oabuf=='RR'?'selected':'';?>>Roraima</option>
										<option value="SC" <?php echo $oabuf=='SC'?'selected':'';?>>Santa Catarina</option>
										<option value="SE" <?php echo $oabuf=='SE'?'selected':'';?>>Sergipe</option>
										<option value="SP" <?php echo $oabuf=='SP'?'selected':'';?>>São Paulo</option>
										<option value="TO" <?php echo $oabuf=='TO'?'selected':'';?>>Tocantins</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<div class="form-group">
									<label for="cpf">CPF</label>
									<input type="text" id="cpf" name="cpf" pattern="[0-9]{3}[\.]?[0-9]{3}[\.]?[0-9]{3}[-]?[0-9]{2}" class="form-control mask_cpf" placeholder="CPF" required value="<?php echo $cpf; ?>"/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="name">Nome</label>
									<input type="text" id="name" name="name" class="form-control" placeholder="Nome completo" required value="<?php echo $name; ?>"/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="phone">Telefone</label>
									<input type="text" id="phone" name="phone" class="form-control mask_phone" placeholder="Telefone" pattern="\([0-9]{2}\)[0-9]{4}-[0-9]{4,5}" value="<?php echo $phone; ?>"/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="cellphone">Celular</label>
									<input type="text" id="cellphone" name="cellphone" class="form-control mask_phone" placeholder="Celular" pattern="\([0-9]{2}\)[0-9]{4}-[0-9]{4,5}" value="<?php echo $cellphone; ?>"/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="email">E-mail</label>
									<input type="email" id="email" name="email" class="form-control" placeholder="E-mail" required value="<?php echo $email; ?>"/>
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
										<input type="text" id="cep" name="cep" class="form-control mask_cep" value="<?php echo $cep; ?>"/>
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
									<input type="text" id="address" name="address" class="form-control" value="<?php echo $address!='null'?$address:'';?>"/>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="number">Número</label>
									<input type="text" id="number" name="number" class="form-control" value="<?php echo $number!='null'?$number:''; ?>"/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="complement">Complemento</label>
									<input type="text" id="complement" name="complement" class="form-control" value="<?php echo $complement!='null'?$complement:''; ?>"/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="neighborhood">Bairro</label>
									<input type="text" id="neighborhood" name="neighborhood" class="form-control" value="<?php echo $neighborhood!='null'?$neighborhood:''; ?>"/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="city">Cidade</label>
									<input type="text" id="city" name="city" class="form-control" value="<?php echo $city!='null'?$city:''; ?>"/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="state">Estado</label>
									<select name="state" id="state" class="form-control">
										<option value="" selected="selected">Selecione o Estado</option>
										<option value="AC" <?php echo $state=='AC'?'selected':'';?>>Acre</option>
										<option value="AL" <?php echo $state=='AL'?'selected':'';?>>Alagoas</option>
										<option value="AM" <?php echo $state=='AM'?'selected':'';?>>Amazonas</option>
										<option value="AP" <?php echo $state=='AP'?'selected':'';?>>Amapá</option>
										<option value="BA" <?php echo $state=='BA'?'selected':'';?>>Bahia</option>
										<option value="CE" <?php echo $state=='CE'?'selected':'';?>>Ceará</option>
										<option value="DF" <?php echo $state=='DF'?'selected':'';?>>Distrito Federal</option>
										<option value="ES" <?php echo $state=='ES'?'selected':'';?>>Espírito Santo</option>
										<option value="GO" <?php echo $state=='GO'?'selected':'';?>>Goiás</option>
										<option value="MA" <?php echo $state=='MA'?'selected':'';?>>Maranhão</option>
										<option value="MT" <?php echo $state=='MT'?'selected':'';?>>Mato Grosso</option>
										<option value="MS" <?php echo $state=='MS'?'selected':'';?>>Mato Grosso do Sul</option>
										<option value="MG" <?php echo $state=='MG'?'selected':'';?>>Minas Gerais</option>
										<option value="PA" <?php echo $state=='PA'?'selected':'';?>>Pará</option>
										<option value="PB" <?php echo $state=='PB'?'selected':'';?>>Paraíba</option>
										<option value="PR" <?php echo $state=='PR'?'selected':'';?>>Paraná</option>
										<option value="PE" <?php echo $state=='PE'?'selected':'';?>>Pernambuco</option>
										<option value="PI" <?php echo $state=='PI'?'selected':'';?>>Piauí</option>
										<option value="RJ" <?php echo $state=='RJ'?'selected':'';?>>Rio de Janeiro</option>
										<option value="RN" <?php echo $state=='RN'?'selected':'';?>>Rio Grande do Norte</option>
										<option value="RO" <?php echo $state=='RO'?'selected':'';?>>Rondônia</option>
										<option value="RS" <?php echo $state=='RS'?'selected':'';?>>Rio Grande do Sul</option>
										<option value="RR" <?php echo $state=='RR'?'selected':'';?>>Roraima</option>
										<option value="SC" <?php echo $state=='SC'?'selected':'';?>>Santa Catarina</option>
										<option value="SE" <?php echo $state=='SE'?'selected':'';?>>Sergipe</option>
										<option value="SP" <?php echo $state=='SP'?'selected':'';?>>São Paulo</option>
										<option value="TO" <?php echo $state=='TO'?'selected':'';?>>Tocantins</option>
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
    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
	<input type="hidden" name="type" value="advogados"/>
</form>
<script src="js/functions_modal.js"></script>