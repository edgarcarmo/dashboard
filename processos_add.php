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
        <h1>Processos > Novo Processo</h1>
      </div>
    </div>
    <br />
    <form action="" method="post" id="add_submit" data-toggle="validator" enctype="multipart/form-data" role="form">
      <div class="container">
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Dados do Processos</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Conta</label>
                    <div class="input-group">
                      <span class="input-group-addon glyphicon glyphicon-book"></span>
                      <input type="text" id="account" name="account" class="form-control" maxlength="17" required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="reu_conta">Réu - Conta</label>
                    <select name="reu_conta" id="reu_conta" class="form-control">
                      <option value="0">Selecione o réu da conta</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="processo">Processo</label>
                    <div class="input-group">
                      <span class="input-group-addon glyphicon glyphicon-file"></span>
                      <input type="text" id="processo" name="processo" class="form-control" required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
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
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="principal">Principal <span class="glyphicon glyphicon-question-sign" title="Permite marcar este processo como principal na conta."></span></label>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" value="0">Processo principal
                      </label>
                    </div>
                  </div>
                  
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                      <option value="0">Selecione o status</option>
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

          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Dados Finaceiros</h3>
            </div>
            <div class="panel-body">
              
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="credito_bruto">Crédito (bruto)</label>
                    <div class="input-group">
                      <span class="input-group-addon">R$</span>
                      <input type="text" id="credito_bruto" name="credito_bruto" class="form-control" maxlength="17" required>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Atualizado</label>
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">%</label>
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="valor_bruto">Valor</label>
                    <div class="input-group">
                      <span class="input-group-addon">R$</span>
                      <input type="text" id="valor_bruto" name="valor_bruto" class="form-control" maxlength="17" required>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="credito_liquido">Crédito (líquido)</label>
                    <div class="input-group">
                      <span class="input-group-addon">R$</span>
                      <input type="text" id="credito_liquido" name="credito_liquido" class="form-control" maxlength="17" required>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Atualizado</label>
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">%</label>
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="valor_bruto">Valor</label>
                    <div class="input-group">
                      <span class="input-group-addon">R$</span>
                      <input type="text" id="valor_bruto" name="valor_bruto" class="form-control" maxlength="17" required>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>

          

        </div>
        <div class="col-md-6">

          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Propostas</h3>
            </div>
            <div class="panel-body">
              
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="proposta_inicial">Proposta Inicial</label>
                    <div class="input-group">
                      <span class="input-group-addon">R$</span>
                      <input type="text" id="proposta_inicial" name="proposta_inicial" class="form-control" maxlength="17" required>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="data_proposta">Data da Proposta</label>
                    <div class="input-group date">
                      <input type="text" id="data_proposta" name="data_proposta" class="form-control" maxlength="17" required>
                      <span class="input-group-addon glyphicon glyphicon-calendar"></span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="valor_aquisicao">Valor da Aquisição</label>
                    <div class="input-group">
                      <span class="input-group-addon">R$</span>
                      <input type="text" id="valor_aquisicao" name="valor_aquisicao" class="form-control" maxlength="17" required>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="data_fechameto">Data do Fechamento</label>
                    <div class="input-group date">
                      <input type="text" id="data_fechamento" name="data_fechamento" class="form-control" maxlength="17" required>
                      <span class="input-group-addon glyphicon glyphicon-calendar"></span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Empresa</label>
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">CR5</label>
                    <input type="checkbox" class="form-control">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="lex">LEX</label>
                    <input type="checkbox" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="honorarios">Honorários Extras</label>
                    <div class="input-group">
                      <span class="input-group-addon">R$</span>
                      <input type="text" id="valor_aquisicao" name="valor_aquisicao" class="form-control" maxlength="17" required>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>

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
            <a href="processos.php" type="button" class="btn btn-default btn_cancel">Cancelar</a>
            <button type="submit" class="btn btn-success">Salvar</button>
          </div>
        </div>
      </div>
      <input type="hidden" name="type" value="processos"/>
    </form>
    
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

      $(".input-group.date").datepicker({
        format: "dd/mm/yyyy",
        language: "pt-BR",
        todayHighlight: true,
        autoclose: true
      });
    </script>
    <?php include_once("includes/template/ga.php"); ?>
  </body>
</html>