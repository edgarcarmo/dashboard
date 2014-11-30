<?php include_once("../template/function.php"); ?>
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
	    case 'status': {
	    	$sql = "SELECT * FROM `status` WHERE 1 ORDER BY `name` asc";
	    	break;
	    }
	    case 'advogados': {
	    	$sql = "SELECT * FROM `advogados` WHERE 1 ORDER BY `name` asc";
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
		if(isset($row['cpf'])){
			$row['cpf'] = mask($row['cpf'],'###.###.###-##');
		}
		if(isset($row['phone'])){
			$row['phone'] = valid9digito($row['phone']);
		}
		if(isset($row['cellphone'])){
			$row['cellphone'] = valid9digito($row['cellphone']);
		}
		if(isset($row['cep'])){
			$row['cep'] = mask($row['cep'],'#####-###');
		}foreach ($row as $key => $value) {
			$arr[$key] = $value;
		}
		$main_arr[] = $arr;
	}
	header('Content-Type: application/json');
	echo json_encode($main_arr);
 ?>