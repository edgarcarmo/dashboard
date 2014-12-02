<?php
	$postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $type = $request->type;
    $id = $request->id;
	include_once("conection.php");
	switch ($type) {
	    case 'comarcas': {
	    	$sql = "DELETE FROM `comarcas` WHERE `id` = $id";
	    	$resultado = mysql_query($sql, $conexao);
	    	break;
	    }
	    case 'status': {
	    	$sql = "DELETE FROM `status` WHERE `id` = $id";
	    	$resultado = mysql_query($sql, $conexao);
	    	break;
	    }
	    case 'usuarios': {
	    	$sql = "DELETE FROM `usuarios` WHERE `id` = $id";
	    	$resultado = mysql_query($sql, $conexao);
	    	break;
	    }
	    case 'advogados': {
	    	$sql = "DELETE FROM `advogados` WHERE `id` = $id";
	    	$resultado = mysql_query($sql, $conexao);
	    	break;
	    }
	    case 'contas': {
	    	$sql = "DELETE FROM `contas` WHERE `id` = $id";
	    	$resultado = mysql_query($sql, $conexao);
	    	$sqlAutor = "DELETE FROM `autor` WHERE `conta` = $id";
	    	$resultadoAutor = mysql_query($sqlAutor, $conexao);
	    	$sqlReu = "DELETE FROM `reu` WHERE `conta` = $id";
	    	$resultadoReu = mysql_query($sqlReu, $conexao);
	    	$sqlAdv = "DELETE FROM `advogados_contas` WHERE `conta` = $id";
	    	$resultadoAdv = mysql_query($sqlAdv, $conexao);
	    	$sqlFiles = "DELETE FROM `files` WHERE `conta` = $id";
	    	$resultadoFiles = mysql_query($sqlFiles, $conexao);
	    	break;
	    }
	    default: {
	    	echo null;
	    	break;
	    }
  	}
  	if(!$resultado) {
		$error = mysql_error();
		$url = "$type.php";
		header('location:../../error.php?error='.$error."&url=".$url);
	} else {
		header('location:../../'.$type.'.php');
	}
 ?>