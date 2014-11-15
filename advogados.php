<?php include_once("includes/login/session_admin.php"); ?> 
<?php include_once("includes/template/function.php"); ?>
<!DOCTYPE html>
<html lang="pt" ng-app="myDashboard">
  <head>
    <?php include_once("includes/template/metas.php"); ?>
    <?php include_once("includes/template/style.php"); ?>
  </head>
  <body ng-controller="dashboard" id="dashboard">
    <?php
        include_once("includes/template/menu.php");
    ?>
    <div class="container">
      <div class="col-md-6">
        <h1>Advogados</h1>
      </div>
    </div>
    <br />
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <table id="table-methods-table" data-toggle="table" data-url="includes/db/list.php?type=advogados" data-cache="false" 
                  data-click-to-select="true" data-show-refresh="true"  
                  data-show-columns="true" data-search="true" data-select-item-name="toolbar1" 
                  data-show-toggle="true" data-pagination="true" data-row-style="rowStyle">
              <thead>
                  <tr>
                      <th data-field="state" data-checkbox="true" data-halign="center" data-align="center"></th>
                      <th data-field="id" data-visible="false" data-halign="center" data-align="center">Item ID</th>
                      <th data-field="name" data-halign="center" data-align="center" data-sortable="true">Nome</th>
                      <th data-field="oab" data-halign="center" data-align="center" data-sortable="true">OAB</th>
                      <th data-field="oabuf" data-halign="center" data-align="center" data-sortable="true">OAB UF</th>
                      <th data-field="cpf" data-halign="center" data-align="center" data-sortable="true">CPF</th>
                      <th data-field="phone" data-halign="center" data-align="center" data-sortable="true">Telefone</th>
                      <th data-field="cellphone" data-halign="center" data-align="center" data-sortable="true">Celular</th>
                      <th data-field="email" data-halign="center" data-align="center" data-sortable="true">E-mail</th>
                      <th data-field="cep" data-visible="false" data-halign="center" data-align="center" data-sortable="true">CEP</th>
                      <th data-field="address" data-visible="false" data-halign="center" data-align="center" data-sortable="true">Endere&#231;o</th>  
                      <th data-field="number" data-visible="false" data-halign="center" data-align="center" data-sortable="true">N&#250;mero</th>  
                      <th data-field="complement" data-visible="false" data-halign="center" data-align="center" data-sortable="true">Complemento</th>  
                      <th data-field="neighborhood" data-visible="false" data-halign="center" data-align="center" data-sortable="true">Bairro</th>  
                      <th data-field="city" data-visible="false"  data-halign="center" data-align="center" data-sortable="true">Cidade</th>  
                      <th data-field="state" data-halign="center" data-align="center" data-sortable="true">Estado</th>    
                      <th data-field="operate" data-formatter="operateFormatter" data-events="operateEvents" data-halign="center" data-align="center">A&ccedil;&otilde;es</th>
                  </tr>
              </thead>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <a class="btn btn-success" href="includes/modal/advogados_add.php" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span> Cadastrar advogados</a>
          <button class="btn btn-danger" id="remove-data" data-method="remove"><span class="glyphicon glyphicon-trash"></span> Remover advogados</button >
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            </div> <!-- /.modal-content -->
        </div> <!-- /.modal-dialog -->
    </div> <!-- /.modal -->
    <input type="hidden" name="type" id="typeRemove" value="advogados"/>
    <?php include_once("includes/template/scripts.php"); ?>
    <script type="text/javascript">
      var teste;
      function operateFormatter(value, row, index) {
        teste = row;
        var url = encodeURI("includes/modal/advogados_edit.php?id="+row.id+"&oab="+row.oab+"&oabuf="+row.oabuf+"&name="+row.name+"&cpf="+row.cpf+"&phone="+row.phone+"&cellphone="+row.cellphone+"&email="+row.email+"&cep="+row.cep+"&address="+row.address+"&number="+row.number+"&complement="+row.complement+"&neighborhood="+row.neighborhood+"&city="+row.city+"&state="+row.state);
        return [
            '<a class="edit ml10" title="Edit" href="'+url+'" data-toggle="modal" data-target="#myModal">',
                '<i class="glyphicon glyphicon-edit"></i>',
            '</a>',
            '<a class="remove ml10" href="javascript:void(0)" title="Remove">',
                '<i class="glyphicon glyphicon-remove"></i>',
            '</a>'
        ].join('');
      }
      window.operateEvents = {
        'click .remove': function (e, value, row, index) {
            $("#dashboard").scope().excluir(JSON.stringify(row.id), null, "advogados");
        }
      };
    </script>
    <?php include_once("includes/template/ga.php"); ?>
  </body>
</html>