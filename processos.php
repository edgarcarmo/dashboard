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
        <h1>Processos</h1>
      </div>
    </div>
    <br />
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <!-- tabela -->
          <table id="table-methods-table" data-toggle="table" data-url="includes/db/list.php?type=processos" data-cache="false" 
                  data-click-to-select="true" data-show-refresh="true"
                  data-show-columns="true" data-search="true" data-select-item-name="toolbar1"
                  data-show-toggle="true" data-pagination="true">
            <thead>
              <tr>
                <th data-field="state" data-checkbox="true" data-halign="center" data-align="center"></th>
                <th data-field="id" data-visible="false" data-halign="center" data-align="center">Item ID</th>
                <th data-field="process" data-halign="center" data-align="center" data-sortable="true">Processo</th>
                <th data-field="account" data-halign="center" data-align="center" data-sortable="true">Conta</th>
                <th data-field="value" data-halign="center" data-align="center" data-sortable="true">Valor</th>
                <th data-field="available" data-halign="center" data-align="center" data-sortable="true">Valor Dispon&#237;vel</th>
                <th data-field="folderserver" data-visible="false" data-halign="center" data-align="center" data-sortable="true">Pasta no Servidor</th>
                <th data-field="stick" data-halign="center" data-align="center" data-sortable="true">Vara</th>
                <th data-field="name" data-halign="center" data-align="center" data-sortable="true">Comarca</th>
                <th data-field="operate" data-formatter="operateFormatter" data-events="operateEvents" data-halign="center" data-align="center">A&ccedil;&otilde;es</th>
              </tr>
            </thead>
          </table>
          <!-- tabela -->
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <a class="btn btn-success" href="processos_add.php" data-backdrop="static" data-keyboard="false"><span class="glyphicon glyphicon-plus"></span> Novo processo</a>
          <button class="btn btn-danger" id="remove-data" data-method="remove"><span class="glyphicon glyphicon-trash"></span> Remover processos</button >
        </div>
      </div>
    </div>

    <!-- scripts -->
    <input type="hidden" name="type" id="typeRemove" value="contas"/>
    <?php include_once("includes/template/scripts.php"); ?>
    <script type="text/javascript">
      function operateFormatter(value, row, index) {
        var url = encodeURI("contas_edit.php?id="+row.id);
        return [
            '<a class="edit ml10" title="Edit" href="'+url+'">',
                '<i class="glyphicon glyphicon-edit"></i>',
            '</a>',
            '<a class="remove ml10" href="javascript:void(0)" title="Remove">',
                '<i class="glyphicon glyphicon-remove"></i>',
            '</a>'
        ].join('');
      }
      window.operateEvents = {
        'click .remove': function (e, value, row, index) {
            $("#dashboard").scope().excluir(JSON.stringify(row.id), null, "contas");
        }
      };
    </script>
    <!-- scripts -->

    <?php include_once("includes/template/ga.php"); ?>
  </body>
</html>