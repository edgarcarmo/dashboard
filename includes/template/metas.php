<?php
	switch (receberPagina($_SERVER['REQUEST_URI'])) {
    case 'login': {
    	echo "<title>Login Lex Capital</title>";
    	echo "<meta name='description' content=''>";
    	echo "<meta name='keyword' content=''>";
        break;
    }
    case 'index': {
    	echo "<title>Dashboard Lex Capital</title>";
    	echo "<meta name='description' content=''>";
    	echo "<meta name='keyword' content=''>";
        break;
    }
    case 'advogados': {
    	echo "<title>Dashboard Advogados</title>";
    	echo "<meta name='description' content=''>";
    	echo "<meta name='keyword' content=''>";
        break;
    }
    case 'contas': {
        echo "<title>Dashboard Contas</title>";
        echo "<meta name='description' content=''>";
        echo "<meta name='keyword' content=''>";
        break;
    }
    case 'comarcas': {
    	echo "<title>Dashboard Comarcas</title>";
    	echo "<meta name='description' content=''>";
    	echo "<meta name='keyword' content=''>";
        break;
    }
    case 'usuarios': {
    	echo "<title>Dashboard Usu&#225;rios</title>";
    	echo "<meta name='description' content=''>";
    	echo "<meta name='keyword' content=''>";
        break;
    }
    case 'status': {
        echo "<title>Dashboard Status</title>";
        echo "<meta name='description' content=''>";
        echo "<meta name='keyword' content=''>";
        break;
    }
    case 'error': {
        echo "<title>Dashboard Error</title>";
        echo "<meta name='description' content=''>";
        echo "<meta name='keyword' content=''>";
        break;
    }
    default: {
    	echo "<title>Dashboard Lex Capital</title>";
    	echo "<meta name='description' content=''>";
    	echo "<meta name='keyword' content=''>";
        break;
    }
  }
?>
<meta name="author" content="Adauto C Fernandes">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">