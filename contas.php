<?php include_once("includes/login/session.php"); ?>
<?php include_once("includes/template/function.php"); ?>
<!DOCTYPE html>
<html lang="pt" ng-app="myDashboard">
  <head>
    <?php include_once("includes/template/metas.php"); ?>
    <?php include_once("includes/template/style.php"); ?>
  </head>
  <body ng-controller="dashboard" id="dashboard">
    <?php include_once("includes/template/menu.php"); ?>
    <div class="container">
      <div class="col-md-6">
        <h1>Contas</h1>
      </div>
    </div>
    <br />
    <div class="container">

    </div>
    <?php include_once("includes/template/scripts.php"); ?>
    <?php include_once("includes/template/ga.php"); ?>
  </body>
</html>