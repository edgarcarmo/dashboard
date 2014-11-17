<?php
	$id = isset($_GET["id"]) ? $_GET["id"] : 0;
	$name = isset($_GET["name"]) ? $_GET["name"] : 0;
	$email = isset($_GET["email"]) ? $_GET["email"] : 0;
	$isadmin = isset($_GET["isadmin"]) ? filter_var($_GET["isadmin"], FILTER_VALIDATE_BOOLEAN) : 0;
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
	<h4 class="modal-title">Usu&#225;rios</h4>
</div>
<form role="form" action="includes/db/edit.php" method="post" id="edit_sumbit" data-toggle="validator">
	<div class="modal-body">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="name">Nome</label>
						<input type="text" id="name" name="name" maxlength="200" class="form-control" placeholder="Nome" required value="<?php echo  $name;?>"/>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="email">E-mail</label>
						<input type="email" id="email" name="email" maxlength="200" class="form-control" placeholder="E-mail" required value="<?php echo  $email;?>"/>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<p style="font-weight: bold">Perfil</p>
						<div class="checkbox">
							<label for="isadmin">
								<input type="checkbox" id="isadmin" name="isadmin" <?php if($isadmin) {echo 'checked="checked"';} else {echo '';} ?> /> Administrador
							</label>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		<button type="submit" class="btn btn-success">Salvar</button>
	</div>
	<input type="hidden" name="id" value="<?php echo $id; ?>"/>
	<input type="hidden" name="type" value="usuarios"/>
</form>
<script src="js/functions_modal.js"></script>