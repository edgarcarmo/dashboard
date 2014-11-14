<?PHP
    session_start();

    //Caso o usuário não esteja autenticado, limpa os dados e redireciona
    if (!isset($_SESSION['email']) and !isset($_SESSION['password'])) {

        //Destrói
        session_destroy();

        //Limpa
        session_unset();

        include_once("includes/db/conection.php");

        // as variáveis login e senha recebem os dados digitados na página anterior
        $email = $_POST['email'];
        $password = $_POST['password'];

        //Comando SQL de verificação de autenticação
        $sql = "SELECT *
        FROM users
        WHERE email = '$email'
        AND password = '$password'";

        $resultado = mysql_query($sql,$conexao) or die ("Erro na seleção da tabela.");

        //Caso consiga logar cria a sessão
        if (mysql_num_rows ($resultado) > 0) {
            // session_start inicia a sessão
            session_start();

            $row_resultado = mysql_fetch_assoc($resultado);

            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['isadmin'] = $row_resultado['isadmin'];
        }
        //Caso contrário redireciona para a página de autenticação
        else {
            //Redireciona para a página de autenticação
            header('location:login.php');
        }
    }

     include_once("includes/login/timeout.php");
?>