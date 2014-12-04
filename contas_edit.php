<?php include_once("includes/login/session.php"); ?>
<?php include_once("includes/template/function.php"); ?>
<?php
   if(isset($_GET['id'])){

      $id = $_GET['id'];
      include_once("includes/db/conection.php");

      $sqlC = "SELECT * FROM `comarcas` WHERE 1 ORDER BY `name` asc";
      $resultadoC = mysql_query($sqlC,$conexao) or die ("Erro na seleção da tabela.");

      $sql = "SELECT * FROM `contas` WHERE `id` = $id";
      $resultado = mysql_query($sql,$conexao) or die ("Erro na seleção da tabela.");
      $dados = mysql_fetch_row($resultado);

      $sqlAutor = "SELECT * FROM `autor` WHERE `conta` = $id";
      $resultadoAutor = mysql_query($sqlAutor,$conexao) or die ("Erro na seleção da tabela.");

      $sqlReu = "SELECT * FROM `reu` WHERE `conta` = $id";
      $resultadoReu = mysql_query($sqlReu,$conexao) or die ("Erro na seleção da tabela.");

      $sqlAdv = "SELECT a.id, a.oab, a.state, a.name, a.cellphone \n"
          . "FROM `advogados` as a \n"
          . "INNER JOIN `advogados_contas` as ac on a.id = ac.advogado\n"
          . "WHERE ac.`conta` = $id";

      $resultadoAdv = mysql_query($sqlAdv,$conexao) or die ("Erro na seleção da tabela.");

      $sqlFiles = "SELECT * FROM `files` WHERE `conta` = $id";
      $resultadoFiles = mysql_query($sqlFiles,$conexao) or die ("Erro na seleção da tabela.");

   } else {
     header('location:contas.php');
   }
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
        <h1>Contas > Editar Conta</h1>
      </div>
    </div>
    <br />
    <form role="form" action="includes/db/edit.php" method="post" id="edit_sumbit" data-toggle="validator" enctype="multipart/form-data">
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
                      <input type="text" id="account" name="account" class="form-control" maxlength="17" required value="<?php echo $dados[1] ?>">
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
                      <input type="text" id="value" name="value" class="form-control moneyReal" value="<?php echo $dados[2] ?>">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="valor_disponivel">Valor Disponível</label>
                    <div class="input-group">
                      <span class="input-group-addon">R$</span>
                      <input type="text" id="available" name="available" class="form-control moneyReal" readonly="readonly" value="<?php echo $dados[3] ?>">
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
                      <input type="text" id="folderserver" name="folderserver" class="form-control" value="<?php echo $dados[4] ?>"/>
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
                    <input type="text" id="process" name="process" class="form-control" placeholder="Processo" value="<?php echo $dados[5] ?>">
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
                          if($i == $dados[6]){
                            echo('<option value="'.$i.'" selected>'.$i.'</option>');
                          } else {
                            echo('<option value="'.$i.'">'.$i.'</option>');
                          }
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="comarca">Comarca</label>
                    <select name="comarca" id="comarca" class="form-control" value="<?php echo $dados[7] ?>">
                      <option value="0">Selecione a comarca</option>
                      <?php
                        while ($c = mysql_fetch_array($resultadoC)) {
                          if($c['id'] == $dados[7]){
                            echo("<option value='".$c['id']."' selected>".$c['name']."</option>");
                          } else {
                            echo("<option value='".$c['id']."'>".$c['name']."</option>");
                          }
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
              <?php
                while ($valor = mysql_fetch_array($resultadoAdv)) {
                  echo ('<tr id="adv'.$valor['id'].'"><th class="text-center"><a class="btn-default" href="#" onclick="removeAdv('.$valor['id'].')" title="Remover advogado"><span class="glyphicon glyphicon-minus-sign"></span></a></span><input type="hidden" value="'.$valor['id'].'" name="advId[]"></th><th>'.$valor['oab'].'</th><th>'.$valor['state'].'</th><th>'.$valor['name'].'</th><th>'.$valor['cellphone'].'</th></tr>');
                }
               ?>
            </table>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Arquivos</h3>
            </div>
            <table class="table table-striped table-bordered" id="listAdv">
              <tr>
                <th>Ação</th>
                <th>Nome</th>
                <th>Tamanho</th>
              </tr>
              <?php
                while ($valor = mysql_fetch_array($resultadoFiles)) {
                  echo ('<tr id="file'.$valor['id'].'"><th class="text-center"><a class="btn-default ml10" href="#" onclick="removeFile('.$valor['id'].')" title="Remover arquivo"><span class="glyphicon glyphicon-minus-sign"></span></a></span><a class="btn-default ml10" href="includes/db/donwloadFile.php?arquivo='.$valor['name'].'" title="Baixar arquivo"><span class="glyphicon glyphicon-download-alt"></span></a></span><input type="hidden" value="'.$valor['id'].'"></th><th>'.$valor['name'].'</th><th>'.$valor['size'].'</th></tr>');
                }
               ?>
            </table>
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
      <input type="hidden" id="id" name="id" value="<?php echo $dados[0] ?>">
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
    <?php
      while ($valor = mysql_fetch_array($resultadoAutor)) {
        echo ('<script type="text/javascript">$(document).ready(function(){$("#dashboard").scope().addAutor("'.$valor['name'].'");});</script>');
      }
      while ($valor = mysql_fetch_array($resultadoReu)) {
        echo ('<script type="text/javascript">$(document).ready(function(){$("#dashboard").scope().addReu("'.$valor['name'].'");});</script>');
      }
    ?>
    <?php include_once("includes/template/ga.php"); ?>
  </body>
</html>