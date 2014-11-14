<?PHP

	$hostname="127.0.0.1";
	$username="lex_dashboard";
	$password="fMyVKahvQbZmbKyL";
	$database="lex_dashboard";

	//Conexão mysql
	$conexao = mysql_connect($hostname, $username, $password) or die ("<h1>Erro na conexão do banco de dados.</h1>");

	//Seleciona o banco de dados
	$selecionabd = mysql_select_db($database,$conexao) or die ("<h1>Banco de dados inexistente.</h1>");

	mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
?>