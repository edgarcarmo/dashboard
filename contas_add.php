<?php include_once("includes/login/session.php"); ?>
<?php include_once("includes/template/function.php"); ?>
<?php
  $sql = "SELECT * FROM `comarcas` WHERE 1 ORDER BY `name` asc";
  include_once("includes/db/conection.php");
  $resultado = mysql_query($sql,$conexao) or die ("Erro na seleção da tabela.");
?>
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
        <h1>Contas > Nova Conta</h1>
      </div>
    </div>
    <br />
    <form role="form" action="includes/db/add.php" method="post" id="add_sumbit" data-toggle="validator" enctype="multipart/form-data">>
      <div class="container">
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Dados da Conta</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="conta">Conta</label>
                    <div class="input-group">
                      <span class="input-group-addon glyphicon glyphicon-book"></span>
                      <input type="text" id="account" name="account" class="form-control" maxlength="17" required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="valor">Valor</label>
                    <div class="input-group">
                      <span class="input-group-addon">R$</span>
                      <input type="text" id="value" name="value" class="form-control moneyReal">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="valor_disponivel">Valor Disponível</label>
                    <div class="input-group">
                      <span class="input-group-addon">R$</span>
                      <input type="text" id="available" name="available" class="form-control moneyReal" readonly="readonly">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="servidor">Pasta no Servidor</label>
                    <div class="input-group">
                      <span class="input-group-addon glyphicon glyphicon-folder-open"></span>
                      <input type="text" id="folderserver" name="folderserver" class="form-control"/>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Processo</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="processo">Processo</label>
                    <input type="text" id="process" name="process" class="form-control" placeholder="Processo">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="vara">Vara</label>
                    <select name="stick" id="stick" class="form-control">
                      <option value="0">Selecione a vara</option>
                      <?php
                        for($i = 1; $i <= 100; $i++){
                          echo('<option value="'.$i.'">'.$i.'</option>');
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="comarca">Comarca</label>
                    <select name="comarca" id="comarca" class="form-control">
                      <option value="0">Selecione a comarca</option>
                      <?php
                        while ($dados = mysql_fetch_array($resultado)) {
                        echo("<option value='".$dados['id']."'>".$dados['name']."</option>");
                        }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="autor">Autor</label>
                    <div class="input-group">
                      <input type="text" id="autorNew" name="autorNew" class="form-control" placeholder="Autor"/>
                      <span class="input-group-btn">
                        <a class="btn btn-default" ng-click="addAutor();" title="Incluir autor">
                            <span class="glyphicon glyphicon-plus-sign"></span>
                        </a>
                      </span>
                    </div>
                  </div>
                  <ul class="list-group" id="listAutor"></ul>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="autor">Réu</label>
                    <div class="input-group">
                      <input type="text" id="reuNew" name="reuNew" class="form-control" placeholder="Réu"/>
                      <span class="input-group-btn">
                        <a class="btn btn-default" ng-click="addReu();" title="Incluir réu">
                            <span class="glyphicon glyphicon-plus-sign"></span>
                        </a>
                      </span>
                    </div>
                  </div>
                  <ul class="list-group" id="listReu"></ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Advogados</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12 pull-right">
                  <div class="btn-group">
                    <a type="button" class="btn btn-primary btn-sm" href="includes/modal/advogados_list.php" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#myModal"><span class="glyphicon glyphicon-import"></span> Associar advogados</a>
                  </div>
                </div>
              </div>
            </div>
            <table class="table table-striped table-bordered" id="listAdv">
              <tr>
                <th>Ação</th>
                <th>OAB</th>
                <th>UF</th>
                <th>Nome</th>
                <th>Celular</th>
              </tr>
            </table>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Arquivos</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input id="files" name="fileUpload[]" type="file" multiple="true">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pull-right">
            <a href="contas.php" type="button" class="btn btn-default btn_cancel">Cancelar</a>
            <button type="submit" class="btn btn-success">Salvar</button>
          </div>
        </div>
      </div>
      <input type="hidden" name="type" value="contas"/>
    </form>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            </div> <!-- /.modal-content -->
        </div> <!-- /.modal-dialog -->
    </div> <!-- /.modal -->
    <?php include_once("includes/template/scripts.php"); ?>
    <script src="js/functions_modal.js"></script>
    <script type="text/javascript">
      $("#files").fileinput({
        showUpload: false,
        layoutTemplates: {
              main1: "{preview}\n" +
              "<div class=\'input-group {class}\'>\n" +
              "   <div class=\'input-group-btn\'>\n" +
              "       {browse}\n" +
              "       {upload}\n" +
              "       {remove}\n" +
              "   </div>\n" +
              "   {caption}\n" +
              "</div>"
          }
      });
    </script>
    <?php include_once("includes/template/ga.php"); ?>
  </body>
</html>