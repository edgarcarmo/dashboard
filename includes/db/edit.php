<?php
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		$type = isset($_POST['type']) ? $_POST['type'] : "";
	    switch ($type) {
		    case 'comarcas': {
		    	$id = isset($_POST['id']) ? $_POST['id'] : "";
		    	$name = isset($_POST['name']) ? $_POST['name'] : "";
			    $sql = "SELECT `name` FROM `comarcas` WHERE `name` = '$name' AND `id` <> '$id'";
			    $sqlUpdate = "UPDATE `comarcas` SET `name` =  '$name' WHERE `id` = '$id'";
		    }
		    default: {
		    	echo null;
		    }
	  	}
	    include_once("conection.php");
	    $resultado = mysql_query($sql, $conexao) or die("Não foi possível consultar $type já cadastradas");
	    if(!mysql_num_rows($resultado) > 0) {

			$resultadoUpdate = mysql_query($sqlUpdate, $conexao) or die ("Erro na seleção da tabela.");

			if ($resultadoUpdate === TRUE) {
			    header('location:../../'.$type.'.php');
			} else {
			    //echo "Error: " . $sql . "<br>" . $conexao->error;
			    $error = $conexao->error;
			    $url = "$type.php";
			    header('location:../../error.php?error='.$error."&url=".$url);
			}
		} else {
			$error = "A $type $name já está cadastrada.";
			$url = "$type.php";
			header('location:../../error.php?error='.$error."&url=".$url);
		}
	} else {
		$error = "Não foi possível salvar os dados informados.";
		$url = "$type.php";
		header('location:../../error.php?error='.$error."&url=".$url);
	}
?>