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
    <form role="form" action="includes/db/add.php" method="post" id="add_sumbit" data-toggle="validator">
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
                    <button type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-import"></span> Associar advogados</button>
                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#"><span class="glyphicon glyphicon-export"></span> Retirar associação</a></li>
                      <li class="divider"></li>
                      <li><a href="#"><span class="glyphicon glyphicon-plus"></span> Novo advogado</a></li>
                      <li><a href="#"><span class="glyphicon glyphicon-edit"></span> Editar selecionado</a></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <table class="table table-striped table-bordered">
              <tr>
                <th><input type="checkbox"></th>
                <th>OAB</th>
                <th>UF</th>
                <th>Nome</th>
                <th>Celular</th>
              </tr>
              <tr>
                <td><input type="checkbox"></td>
                <td>123345</td>
                <td>SP</td>
                <td>Edgar de Oliveira Carmo</td>
                <td>(11) 99338-9037</td>
              </tr>
              <tr>
                <td><input type="checkbox"></td>
                <td>123345</td>
                <td>SP</td>
                <td>Edgar de Oliveira Carmo</td>
                <td>(11) 99338-9037</td>
              </tr>
            </table>
          </div>  
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Arquivos</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <input type="file" id="file[]" name="file[]" multiple>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="pull-right">
                    <button class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-save"></span> Importar</button>
                  </div>
                </div>
              </div>
            </div>
            <table class="table table-striped table-bordered">
              <tr>
                <th>#</th>
                <th>Arquivo</th>
                <th>Tamanho</th>
              </tr> 
              <tr>
                <td>1</td>
                <td>Imagem1.jpg</td>
                <td>0.23 MB</td>
              </tr>
              <tr>
                <td>2</td>
                <td>arquivo_exemplo.doc</td>
                <td>3.00 MB</td>
              </tr>
            </table>
          </div>
          <div class="pull-right">
            <a href="contas.php" type="button" class="btn btn-default btn_cancel">Cancelar</a>
            <button type="submit" class="btn btn-success">Salvar</button>
          </div>          
        </div>
      </div>
      <input type="hidden" name="type" value="contas"/>
    </form>
    <?php include_once("includes/template/scripts.php"); ?>
    <script src="js/functions_modal.js"></script>
    <?php include_once("includes/template/ga.php"); ?>
  </body>
</html>