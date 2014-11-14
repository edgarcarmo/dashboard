<?php
  include_once("includes/login/session_admin.php"); 
  include_once("includes/template/function.php");
?>
<!DOCTYPE html>
<html lang="pt" ng-app="myDashboard">
  <head>
    <?php
      include_once("includes/template/metas.php");
      include_once("includes/template/style.php");
    ?>
  </head>
  <body ng-controller="dashboard" id="dashboard">
    <?php
        include_once("includes/template/menu.php");
    ?>
    <div class="container">
      <div class="col-md-6">
        <h1>Comarcas</h1>
      </div>
    </div>
    <br />
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <table data-toggle="table" data-url="includes/db/list.php?type=comarcas" data-cache="false" 
                  data-click-to-select="true" data-show-refresh="true"  
                  data-show-columns="true" data-search="true" data-select-item-name="toolbar1" 
                  data-show-toggle="true" data-pagination="true">
              <thead>
                  <tr>
                      <th data-field="state" data-checkbox="true"></th>
                      <th data-field="id">Item ID</th>
                      <th data-field="name">Comarca</th>
                      <th data-field="operate" data-formatter="operateFormatter" data-events="operateEvents">A&ccedil;&otilde;es</th>
                  </tr>
              </thead>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Cadastrar comarcas</button>
          <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Remover comarcas</button>
        </div>
      </div>
    </div>
    <?php
        include_once("includes/template/scripts.php");
        include_once("includes/template/ga.php");
    ?>
  </body>
</html>