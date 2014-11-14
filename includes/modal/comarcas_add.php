<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
	<h4 class="modal-title">Comarca</h4>
</div>
<form role="form" action="includes/db/add.php" method="post" id="add_sumbit" data-toggle="validator">
	<div class="modal-body">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="name">Nome</label>
						<input type="text" id="name" name="name" maxlength="200" class="form-control" placeholder="Nome" required/>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default btn_cancel" data-dismiss="modal">Cancelar</button>
		<button type="submit" class="btn btn-success">Salvar</button>
	</div>
	<input type="hidden" name="type" value="comarcas"/>
</form>