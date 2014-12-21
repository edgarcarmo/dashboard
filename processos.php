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
          <p>tabela aqui...</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <a class="btn btn-success" href="includes/modal/comarcas_add.php" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span> Novo processo</a>
          <button class="btn btn-danger" id="remove-data" data-method="remove"><span class="glyphicon glyphicon-trash"></span> Remover processos</button >
        </div>
      </div>
    </div>

    <?php include_once("includes/template/ga.php"); ?>
  </body>
</html>