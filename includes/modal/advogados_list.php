<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
	<h4 class="modal-title">Advogado</h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <table id="table-methods-table" data-toggle="table" data-url="includes/db/list.php?type=advogados" data-cache="false" 
	                  data-click-to-select="true" data-search="true"
	                  data-pagination="true" >
	              <thead>
	                  <tr>
	                      <th data-field="state" data-checkbox="true" data-halign="center" data-align="center"></th>
	                      <th data-field="id" data-visible="false" data-halign="center" data-align="center">Item ID</th>
	                      <th data-field="name" data-halign="center" data-align="center" data-sortable="true">Nome</th>
	                      <th data-field="oab" data-halign="center" data-align="center" data-sortable="true">OAB</th>
	                      <th data-field="oabuf" data-halign="center" data-align="center" data-sortable="true">OAB UF</th>
	                      <th class="mask_cpf" data-visible="false"data-field="cpf" data-field="cpf" data-halign="center" data-align="center" data-sortable="true">CPF</th>
	                      <th class="mask_phone" data-field="phone" data-halign="center" data-align="center" data-sortable="true">Telefone</th>
	                      <th class="mask_phone" data-field="cellphone" data-halign="center" data-align="center" data-sortable="true">Celular</th>
	                      <th data-field="email" data-halign="center" data-align="center" data-sortable="true">E-mail</th>
	                      <th class="mask_cep" data-visible="false"data-field="cep" data-visible="false" data-halign="center" data-align="center" data-sortable="true">CEP</th>
	                      <th data-field="address" data-visible="false" data-halign="center" data-align="center" data-sortable="true">Endere&#231;o</th>
	                      <th data-field="number" data-visible="false" data-halign="center" data-align="center" data-sortable="true">N&#250;mero</th>
	                      <th data-field="complement" data-visible="false" data-halign="center" data-align="center" data-sortable="true">Complemento</th>
	                      <th data-field="neighborhood" data-visible="false" data-halign="center" data-align="center" data-sortable="true">Bairro</th>
	                      <th data-field="city" data-visible="false"  data-halign="center" data-align="center" data-sortable="true">Cidade</th>
	                      <th data-field="state" data-halign="center" data-align="center" data-sortable="true">Estado</th>
	                  </tr>
	              </thead>
	          </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">&nbsp;</div>
        <div class="col-md-4">
            <div class="pull-right">
                <button type="button" class="btn btn-default btn_cancel" data-dismiss="modal">Cancelar</button>
                <a href="#" onclick="associar();" class="btn btn-success" data-dismiss="modal">Associar</a>
            </div>
        </div>
    </div>
</div>
<?php include_once("../template/scripts.php"); ?>
<script src="js/functions_modal.js"></script>
<script type="text/javascript">
  function associar() {
    var id = 0;
    var oab = "";
    var state = "";
    var name = "";
    var cellphone = "";
    var getRows = function ()   {
        var rows = [];
        for (var i = 0; i < 10; i++) {
            rows.push({
                id: id,
                oab: oab,
                state: state,
                name: name,
                cellphone: cellphone
            });
        }
        return rows;
    };
    $table = $('#table-methods-table').bootstrapTable({data: getRows()});
    var selects = $table.bootstrapTable('getSelections');
    $.map(selects, function (row) {
    	$("#listAdv").append('<tr id="adv'+row.id+'"><th class="text-center"><a class="btn-default" href="#" onclick="removeAdv('+row.id+')" title="Remover advogado"><span class="glyphicon glyphicon-minus-sign"></span></a></span><input type="hidden" value="'+row.id+'" name="advId[]"></th><th>'+row.oab+'</th><th>'+row.state+'</th><th>'+row.name+'</th><th>'+row.cellphone+'</th></tr>');
    });
  }
</script>



