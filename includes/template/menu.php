<?php
  $paginaURL = receberPagina($_SERVER['REQUEST_URI']);
  switch ($paginaURL) {
    case 'login': {$nav0 = true; break;}
    case 'index': {$nav1 = true; break;}
    case 'advogados': {$nav2 = true; break;}
    case 'contas': {$nav3 = true; break;}
    case 'processos': {$nav4 = true; break;}
    case 'comarcas': {$nav9 = true; break;}
    case 'usuarios': {$nav9 = true; break;}
    case 'status': {$nav9 = true; break;}
    default: {$nav1 = true; break;}
  }
?>
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" <?php if(isset($nav0)) {echo 'href="login.php"';} else {echo 'href="index.php"';} ?>>Dashboard</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php if(isset($nav1)) {echo 'class="active"';} ?>><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li <?php if(isset($nav2)) {echo 'class="active"';} ?>><a href="advogados.php"><span class="glyphicon glyphicon-user"></span> Advogados</a></li>
        <li <?php if(isset($nav3)) {echo 'class="active"';} ?>><a href="contas.php"><span class="glyphicon glyphicon-book"></span> Contas</a></li>
        <li <?php if(isset($nav4)) {echo 'class="active"';} ?>><a href="processos.php"><span class="glyphicon glyphicon-file"></span> Processos</a></li>
        <li <?php if(isset($nav9)) {echo 'class="dropdown active"';} else {echo 'class="dropdown"';}?>>
          <a href="#" data-toggle="dropdown" id="adminMenu"><span class="glyphicon glyphicon-cog"></span> Administra&ccedil;&atilde;o <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li role="presentation" class="dropdown-header">Configurações</li>
            <li><a href="comarcas.php">Comarcas</a></li>
            <li><a href="status.php">Status</a></li>
            <li class="divider"></li>
            <li role="presentation" class="dropdown-header">Controle de acesso</li>
            <li><a href="usuarios.php">Usuários</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a ng-click="logout()" href="#"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>