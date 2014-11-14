<?php  
	switch (receberPagina($_SERVER['REQUEST_URI'])) {
    case 'login': {
    	echo "<title>Login Lex Capital</title>";
    	echo "<meta name='description' content=''>";
    	echo "<meta name='keyword' content=''>";
    }
    case 'index': {
    	echo "<title>Dashboard Lex Capital</title>";
    	echo "<meta name='description' content=''>";
    	echo "<meta name='keyword' content=''>";
    }
    case 'advogados': {
    	echo "<title>Dashboard Advogados</title>";
    	echo "<meta name='description' content=''>";
    	echo "<meta name='keyword' content=''>";
    }
    case 'comarcas': {
    	echo "<title>Dashboard Comarcas</title>";
    	echo "<meta name='description' content=''>";
    	echo "<meta name='keyword' content=''>";
    }
    case 'usuarios': {
    	echo "<title>Dashboard Usu&#225;rios</title>";
    	echo "<meta name='description' content=''>";
    	echo "<meta name='keyword' content=''>";
    }
    case 'error': {
        echo "<title>Dashboard Error</title>";
        echo "<meta name='description' content=''>";
        echo "<meta name='keyword' content=''>";
    }
    default: {
    	echo "<title>Dashboard Lex Capital</title>";
    	echo "<meta name='description' content=''>";
    	echo "<meta name='keyword' content=''>";
    }
  }
?>
<meta name="author" content="Adauto C Fernandes">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">	