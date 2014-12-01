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
	    case 'contas': {
	    	$sql = "SELECT c.id, c.account, c.value, c.available, c.folderserver, c.process, c.stick, cm.name \n"
				    . "FROM contas as c\n"
				    . "LEFT OUTER JOIN comarcas as cm on c.comarca = cm.id\n"
				    . "WHERE 1 \n"
				    . "ORDER BY account asc";
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
		if(isset($row['value'])){
			$row['value'] = 'R$ '.number_format($row['value'], 2, ',', '.');
		} else if(isset($row['available'])){
			$row['available'] = 'R$ '.number_format($row['available'], 2, ',', '.');
		} else if(isset($row['cpf'])){
			$row['cpf'] = mask($row['cpf'],'###.###.###-##');
		} else if(isset($row['phone'])){
			$row['phone'] = valid9digito($row['phone']);
		} else if(isset($row['cellphone'])){
			$row['cellphone'] = valid9digito($row['cellphone']);
		} else if(isset($row['cep'])){
			$row['cep'] = mask($row['cep'],'#####-###');
		}
		foreach ($row as $key => $value) {
			$arr[$key] = $value;
		}
		$main_arr[] = $arr;
	}
	header('Content-Type: application/json');
	echo json_encode($main_arr);
 ?>