<?php
	// Timeout em segundos
	$inactive = 1800;

	// check to see if $_SESSION['timeout'] is set
	if (isset($_SESSION['timeout'])) {
		$session_life = time() - $_SESSION['timeout'];
		if ($session_life > $inactive) {
			//Destrói
		    session_destroy();

		    //Limpa
		   	session_unset();

		    //Redireciona para a página de autenticação
		    header('location:login.php');
		}
	}
	$_SESSION['timeout'] = time();
 ?>