<?php
	$id = isset($_GET["id"]) ? $_GET["id"] : 0;
	$name = isset($_GET["name"]) ? $_GET["name"] : 0;
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
	<h4 class="modal-title">Comarca</h4>
</div>
<form role="form" action="includes/db/edit.php" method="post" id="edit_sumbit" data-toggle="validator">
	<div class="modal-body">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="name">Nome</label>
						<input type="text" id="name" name="name" maxlength="200" class="form-control" placeholder="Nome" required value="<?php echo $name; ?>"/>
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
	<input type="hidden" name="type" value="comarcas"/>
</form>
<script src="js/functions_modal.js"></script>