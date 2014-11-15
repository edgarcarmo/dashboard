<?php
	$postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $type = $request->type;
    $id = $request->id;
	switch ($type) {
	    case 'comarcas': {
	    	$sql = "DELETE FROM `comarcas` WHERE `id` = $id";
	    	break;
	    }
	    case 'usuarios': {
	    	$sql = "DELETE FROM `usuarios` WHERE `id` = $id";
	    	break;
	    }
	    case 'advogados': {
	    	$sql = "DELETE FROM `advogados` WHERE `id` = $id";
	    	break;
	    }
	    default: {
	    	echo null;
	    	break;
	    }
  	}
  	include_once("conection.php");
	$resultado = mysql_query($sql, $conexao);
	if(!$resultado) {
		$error = mysql_error();
		$url = "$type.php";
		header('location:../../error.php?error='.$error."&url=".$url);
	} else {
		header('location:../../'.$type.'.php');
	}
 ?>