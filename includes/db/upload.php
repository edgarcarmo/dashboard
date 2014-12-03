<?php
  // Pasta onde o arquivo vai ser salvo
  $_UP['pasta'] = '../../files/';

  // Tamanho máximo do arquivo (em Bytes)
  $_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb

  // Array com as extensões permitidas
  $_UP['extensoes'] = array('jpg', 'png', 'gif', 'txt', 'csv', 'xls', 'xlsx', 'doc', 'docx');

  // Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
  $_UP['renomeia'] = false;

  //Atribui uma array com os nomes dos arquivos à variável
  $name = $_FILES['fileUpload']['name'];
  //Atribui uma array com os nomes temporários dos arquivos à variável
  $tmp_name = $_FILES['fileUpload']['tmp_name'];
  //Tamanho do arquivo
  $size = $_FILES["fileUpload"]["size"];
  //Erros
  $error = $_FILES['fileUpload']['error'];

  //Passa por todos os arquivos
  for($i = 0; $i < count($tmp_name); $i++) {

    // Faz a verificação da extensão do arquivo
    $extensao = strtolower(end(explode('.', $name[$i])));
    if (array_search($extensao, $_UP['extensoes']) === false) {
      $error = "Por favor, envie arquivos com as seguintes extensões: jpg, png, gif, txt, csv, xls, xslx, doc ou docx";
      header('location:../../error.php?error='.$error."&url=".$url);
    }

    // Faz a verificação do tamanho do arquivo
    else if ($_UP['tamanho'] < $size[$i]) {
      $error = "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
      header('location:../../error.php?error='.$error."&url=".$url);
    }

    // O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
    else {
    // Primeiro verifica se deve trocar o nome do arquivo
      if ($_UP['renomeia'] == true) {
    // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
        $nome_final = time().'.jpg';
      } else {
    // Mantém o nome original do arquivo
        $nome_final = sanitizeString($row['id']."_".$name[$i]);
      }

    // Depois verifica se é possível mover o arquivo para a pasta escolhida
      if (move_uploaded_file($tmp_name[$i], $_UP['pasta'] . $nome_final)) {
        $sqlInsertFile = "INSERT INTO `files` (`conta`, `name`, `size`) VALUES (".$row['id'].", '".$name[$i]."', '$nome_final')";
        $resultadoInsertFile = mysql_query($sqlInsertFile, $conexao) or die ("Erro na seleção da tabela.");
      } else {
    // Não foi possível fazer o upload, provavelmente a pasta está incorreta
        $error = "Não foi possível enviar o arquivo, tente novamente";
        header('location:../../error.php?error='.$error."&url=".$url);
      }
    }
  }
?>