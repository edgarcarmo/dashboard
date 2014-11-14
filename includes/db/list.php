<?php
	$type = isset($_GET['type']) ? $_GET['type'] : "";
    switch ($type) {
	    case 'comarcas': {
	    	$sql = "SELECT * FROM `comarcas` WHERE 1 ORDER BY `name` asc";
	    	break;
	    }
	    case 'usuarios': {
	    	$sql = "SELECT * FROM `usuarios` WHERE 1 ORDER BY `name` asc, `email` asc";
	    	break;
	    }
	    default: {
	    	echo null;
	    	break;
	    }
  	}
  	include_once("conection.php");
  	$resultado = mysql_query($sql,$conexao) or die ("Erro na seleção da tabela.");
	while($row = mysql_fetch_array($resultado)) {
		foreach ($row as $key => $value) {
			$arr[$key] = $value;
		}
		$main_arr[] = $arr;
	}
	header('Content-Type: application/json');
	echo json_encode($main_arr);
 ?>