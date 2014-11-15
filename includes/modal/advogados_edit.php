<?php
	$id = $_GET["id"];
	$oab = $_GET["oab"];
	$oabuf = $_GET["oabuf"];
	$name = $_GET["name"];
	$cpf = $_GET["cpf"];
	$phone = isset($_GET['phone']) ? $_GET['phone'] : "";
	$cellphone = isset($_GET['cellphone']) ? $_GET['cellphone'] : "";
	$email = isset($_GET['email']) ? $_GET['email'] : "";
	$cep = isset($_GET['cep']) ? $_GET['cep'] : "";
	$address = isset($_GET['address']) ? $_GET['address'] : "";
	$number = isset($_GET['number']) ? $_GET['number'] : "";
	$complement = isset($_GET['complement']) ? $_GET['complement'] : "";
	$neighborhood = isset($_GET['neighborhood']) ? $_GET['neighborhood'] : "";
	$city = isset($_GET['city']) ? $_GET['city'] : "";
	$state = isset($_GET['state']) ? $_GET['state'] : "";
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
	<h4 class="modal-title">Advogado</h4>
</div>
<form role="form" action="includes/db/edit.php" method="post" id="edit_sumbit" data-toggle="validator">
	<div class="modal-body">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6"><h4>Dados Cadastrais</h4></div>
				<div class="col-md-6"><h4>Endereços</h4></div>
			</div>
			<div class="row">
				<div class="col-md-6">
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
						<div class="col-md-4">
							<div class="form-group">
								<label for="cpf">CPF</label>
								<input type="text" id="cpf" name="cpf" pattern="[0-9]{3}[\.]?[0-9]{3}[\.]?[0-9]{3}[-]?[0-9]{2}" class="form-control mask_cpf" placeholder="CPF" required value="<?php echo $cpf; ?>"/>
							</div>
						</div>
						<div class="col-md-8">
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
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="cep">CEP</label>
								<input type="text" id="cep" name="cep" class="form-control" value="<?php echo $cep; ?>"/>
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
								<input type="text" id="address" name="address" class="form-control" value="<?php echo $address; ?>"/>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="number">Número</label>
								<input type="text" id="number" name="number" class="form-control" value="<?php echo $number; ?>"/>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="complement">Complemento</label>
								<input type="text" id="complement" name="complement" class="form-control" value="<?php echo $complement; ?>"/>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="neighborhood">Bairro</label>
								<input type="text" id="neighborhood" name="neighborhood" class="form-control" value="<?php echo $neighborhood; ?>"/>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="city">Cidade</label>
								<input type="text" id="city" name="city" class="form-control" value="<?php echo $city; ?>"/>
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
	<div class="modal-footer">
		<button type="button" class="btn btn-default btn_cancel" data-dismiss="modal">Cancelar</button>
		<button type="submit" class="btn btn-success">Salvar</button>
	</div>
	<input type="hidden" name="id" value="<?php echo $id; ?>"/>
	<input type="hidden" name="type" value="advogados"/>
</form>
<script type="text/javascript">
	$('#myModal').on('hidden.bs.modal', function () {
        $(this).removeData('bs.modal');
        $("#dashboard").scope().refresh();
    });

	$(document).ready(function(){
	    $('.mask_cpf').mask('999.999.999-99');
	    $(".mask_phone").mask("(99)9999-9999?9").ready(function(event) {
        var target, phone, element;
        target = (event.currentTarget) ? event.currentTarget : event.srcElement;
        phone = target.value.replace(/\D/g, '');
        element = $(target);
        element.unmask();
        if(phone.length > 10) {
            element.mask("(99)99999-999?9");
        } else {
            element.mask("(99)9999-9999?9");
        }
    });
	});
</script>
