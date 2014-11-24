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
        <h1>Usu&#225;rios</h1>
      </div>
    </div>
    <br />
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <table id="table-methods-table" data-toggle="table" data-url="includes/db/list.php?type=usuarios" data-cache="false" 
                  data-click-to-select="true" data-show-refresh="true"
                  data-show-columns="true" data-search="true" data-select-item-name="toolbar1"
                  data-show-toggle="true" data-pagination="true" >
              <thead>
                  <tr>
                      <th data-field="state" data-checkbox="true" data-halign="center" data-align="center"></th>
                      <th data-field="id" data-visible="false" data-halign="center" data-align="center">Item ID</th>
                      <th data-field="name" data-halign="center" data-align="center" data-sortable="true">Nome</th>
                      <th data-field="email" data-halign="center" data-align="center" data-sortable="true">E-mail</th>
                      <th data-field="isadmin" data-halign="center" data-align="center">Admin</th>
                      <th data-field="operate" data-formatter="operateFormatter" data-events="operateEvents" data-halign="center" data-align="center">A&ccedil;&otilde;es</th>
                  </tr>
              </thead>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <a class="btn btn-success" href="includes/modal/usuarios_add.php" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span> Cadastrar usu&#225;rios</a>
          <button class="btn btn-danger" id="remove-data" data-method="remove"><span class="glyphicon glyphicon-trash"></span> Remover usu&#225;rios</button >
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div> <!-- /.modal-content -->
        </div> <!-- /.modal-dialog -->
    </div> <!-- /.modal -->
    <input type="hidden" name="type" id="typeRemove" value="usuarios"/>
    <?php include_once("includes/template/scripts.php"); ?>
    <script type="text/javascript">
      function operateFormatter(value, row, index) {
        var url = encodeURI("includes/modal/usuarios_edit.php?id="+row.id+"&name="+row.name+"&email="+row.email+"&isadmin="+row.isadmin);
        return [
            '<a class="edit ml10" title="Edit" href="'+url+'" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#myModal">',
                '<i class="glyphicon glyphicon-edit"></i>',
            '</a>',
            '<a class="remove ml10" href="javascript:void(0)" title="Remove">',
                '<i class="glyphicon glyphicon-remove"></i>',
            '</a>'
        ].join('');
      }
      window.operateEvents = {
        'click .remove': function (e, value, row, index) {
            $("#dashboard").scope().excluir(JSON.stringify(row.id), null, "usuarios");
        }
      };
    </script>
    <?php include_once("includes/template/ga.php"); ?>
  </body>
</html>