<?php include_once("../template/function.php"); ?>
<?php
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		$type = isset($_POST['type']) ? $_POST['type'] : "";
	    switch ($type) {
		    case 'comarcas': {
		    	$name = isset($_POST['name']) ? $_POST['name'] : "";
			    $sql = "SELECT * FROM `comarcas` WHERE `name` = '$name'";
			    $sqlInsert = "INSERT INTO `comarcas`(`name`) VALUES ('$name')";
			    $printError = "A comcarca ".$name;
			    break;
		    }
		    case 'status': {
		    	$name = isset($_POST['name']) ? $_POST['name'] : "";
			    $sql = "SELECT * FROM `status` WHERE `name` = '$name'";
			    $sqlInsert = "INSERT INTO `status`(`name`) VALUES ('$name')";
			    $printError = "O status ".$name;
			    break;
		    }
		    case 'usuarios': {
		    	$name = isset($_POST["name"]) ? $_POST["name"] : "";
				$email = isset($_POST["email"]) ? $_POST["email"] : "";
				$password = isset($_POST["password"]) ? $_POST["password"] : "";
				$isAdmin = isset($_POST["isadmin"]) ? filter_var($_POST["isadmin"], FILTER_VALIDATE_BOOLEAN) : 0;
			    $sql = "SELECT `email` FROM `usuarios` WHERE `email` = '$email'";
			    $sqlInsert = "INSERT INTO `usuarios` (`name`, `email`, `password`, `isadmin`) VALUES ('$name','$email', '$password', $isAdmin)";
			    $printError = "O usuário ".$email;
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
				$sqlOab = "SELECT `oab`FROM `advogados` WHERE `oab` = '$oab'";
				$sqlCpf = "SELECT `cpf`FROM `advogados` WHERE `cpf` = '$cpf'";
				$sqlEmai = "SELECT `email`FROM `advogados` WHERE `email` = '$email'";
			    $sqlInsert = "INSERT INTO `advogados` (`oab`, `oabuf`, `cpf`, `name`, `phone`, `cellphone`, `email` ,`cep` ,`address` ,`number` ,`complement` ,`neighborhood` ,`city` ,`state`) VALUES ('$oab','$oabuf', '$cpf', '$name', '$phone', '$cellphone', '$email','$cep' ,'$address' ,'$number' ,'$complement' ,'$neighborhood' ,'$city' ,'$state')";
			    break;
		    }
		    default: {
		    	echo null;
		    }
	  	}
	    include_once("conection.php");
     	switch ($type) {
		    case 'advogados': {
		    	$resultado = mysql_query($sqlOab, $conexao) or die("Não foi possível consultar $type já cadastradas");
				if(mysql_num_rows($resultado) > 0){
					$printError = "O registro da oab ".$oab;
					break;
				}

				$sqlCpf = "SELECT `cpf`FROM `advogados` WHERE `cpf` = '$cpf'";
				$resultadoCpf = mysql_query($sqlCpf, $conexao) or die("Não foi possível consultar $type já cadastradas");
				if(mysql_num_rows($resultadoCpf) > 0){
					$printError = "O cpf ".$cpf;
					$resultado = $resultadoCpf;
					break;
				}

				$sqlEmail = "SELECT `email`FROM `advogados` WHERE `email` = '$email'";
				$resultadoEmail = mysql_query($sqlEmail, $conexao) or die("Não foi possível consultar $type já cadastradas");
				if(mysql_num_rows($resultadoEmail) > 0){
					$printError = "O email ".$email;
					$resultado = $resultadoEmail;
					break;
				}
				break;
		    }
		    default: {
		    	$resultado = mysql_query($sql, $conexao) or die("Não foi possível consultar $type já cadastradas");
		    }
	  	}
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
			$error = "$printError já está cadastrada.";
			$url = "$type.php";
			header('location:../../error.php?error='.$error."&url=".$url);
		}
	} else {
		$error = "Não foi possível salvar os dados informados.";
		$url = "$type.php";
		header('location:../../error.php?error='.$error."&url=".$url);
	}
 ?>