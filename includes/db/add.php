<?php
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		$type = isset($_POST['type']) ? $_POST['type'] : "";
	    switch ($type) {
		    case 'comarcas': {
		    	$name = isset($_POST['name']) ? $_POST['name'] : "";
			    $sql = "SELECT * FROM `comarcas` WHERE `name` = '$name'";
			    $sqlInsert = "INSERT INTO `comarcas`(`name`) VALUES ('$name')";
			    $printError = $name;
			    break;
		    }
		    case 'usuarios': {
		    	$name = isset($_POST["name"]) ? $_POST["name"] : "";
				$email = isset($_POST["email"]) ? $_POST["email"] : "";
				$password = isset($_POST["password"]) ? $_POST["password"] : "";
				$isAdmin = isset($_POST["isadmin"]) ? filter_var($_POST["isadmin"], FILTER_VALIDATE_BOOLEAN) : 0;
			    $sql = "SELECT `email` FROM `usuarios` WHERE `email` = '$email'";
			    $sqlInsert = "INSERT INTO `usuarios` (`name`, `email`, `password`, `isadmin`) VALUES ('$name','$email', '$password', $isAdmin)";
			    $printError = $email;
			    break;
		    }
		    default: {
		    	echo null;
		    }
	  	}
	    include_once("conection.php");
	    $resultado = mysql_query($sql, $conexao) or die("Não foi possível consultar $type já cadastradas");
	    if(!mysql_num_rows($resultado) > 0) {

			$resultadoInsert = mysql_query($sqlInsert, $conexao) or die ("Erro na seleção da tabela.");

			if ($resultadoInsert === TRUE) {
			    header('location:../../'.$type.'.php');
			} else {
			    //echo "Error: " . $sql . "<br>" . $conexao->error;
			    $error = $conexao->error;
			    $url = "$type.php";
			    header('location:../../error.php?error='.$error."&url=".$url);
			}
		} else {
			$error = "A $type $printError já está cadastrada.";
			$url = "$type.php";
			header('location:../../error.php?error='.$error."&url=".$url);
		}
	} else {
		$error = "Não foi possível salvar os dados informados.";
		$url = "$type.php";
		header('location:../../error.php?error='.$error."&url=".$url);
	}
 ?>