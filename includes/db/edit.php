<?php include_once("../template/function.php"); ?>
<?php
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		$type = isset($_POST['type']) ? $_POST['type'] : "";
	    switch ($type) {
		    case 'comarcas': {
		    	$id = isset($_POST['id']) ? $_POST['id'] : "";
		    	$name = isset($_POST['name']) ? $_POST['name'] : "";
			    $sql = "SELECT `name` FROM `comarcas` WHERE `name` = '$name' AND `id` <> '$id'";
			    $sqlUpdate = "UPDATE `comarcas` SET `name` =  '$name' WHERE `id` = '$id'";
			    $printError = $name;
			    break;
		    }
		    case 'usuarios': {
		    	$id = isset($_POST['id']) ? $_POST['id'] : "";
			 	$name = isset($_POST['name']) ? $_POST['name'] : "";
			 	$email = isset($_POST['email']) ? $_POST['email'] : "";
			 	$isadmin = isset($_POST["isadmin"]) ? filter_var($_POST["isadmin"], FILTER_VALIDATE_BOOLEAN) : 0;
			    $sql = "SELECT `email` FROM `usuarios` WHERE `email` = '$email' AND `id` <> '$id'";
			    $sqlUpdate = "UPDATE `usuarios` SET `name` =  '$name', `email` =  '$email', `isadmin` =  '$isadmin' WHERE `id` = '$id'";
			    $printError = $email;
			    break;
		    }
		    case 'advogados': {
		    	$id = isset($_POST['id']) ? $_POST['id'] : "";
			 	$oab = isset($_POST['oab']) ? $_POST['oab'] : "";
				$oabuf = isset($_POST['oabuf']) ? $_POST['oabuf'] : "";
				$name = isset($_POST['name']) ? $_POST['name'] : "";
				$cpf = isset($_POST['cpf']) ? replaceAll($_POST['cpf']) : "";
				$phone = isset($_POST['phone']) ? replaceAll($_POST['phone']) : "";
				$cellphone = isset($_POST['cellphone']) ? replaceAll($_POST['cellphone']) : "";
				$email = isset($_POST['email']) ? $_POST['email'] : "";
				$cep = isset($_POST['cep']) ? replaceAll($_POST['cep']) : "";
				$address = isset($_POST['address']) ? $_POST['address'] : "";
				$number = isset($_POST['number']) ? $_POST['number'] : "";
				$complement = isset($_POST['complement']) ? $_POST['complement'] : "";
				$neighborhood = isset($_POST['neighborhood']) ? $_POST['neighborhood'] : "";
				$city = isset($_POST['city']) ? $_POST['city'] : "";
				$state = isset($_POST['state']) ? $_POST['state'] : "";
			    $sql = "SELECT `oab`FROM `advogados` WHERE `oab` = '$oab' AND `id` <> '$id'";
			    $sqlUpdate = "UPDATE `advogados` SET `oab` =  '$oab', `oabuf` =  '$oabuf', `name` =  '$name', `cpf` =  '$cpf', `phone` =  '$phone', `cellphone` =  '$cellphone', `email` =  '$email', `cep` =  '$cep', `address` =  '$address', `number` =  '$number', `complement` =  '$complement', `neighborhood` =  '$neighborhood', `city` =  '$city', `state` =  '$state' WHERE `id` = '$id'";
			    $printError = $oab;
			    break;
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
			$error = "A $type $sqlUpdate já está cadastrada.";
			$url = "$type.php";
			header('location:../../error.php?error='.$error."&url=".$url);
		}
	} else {
		$error = "Não foi possível salvar os dados informados.";
		$url = "$type.php";
		header('location:../../error.php?error='.$error."&url=".$url);
	}
?>