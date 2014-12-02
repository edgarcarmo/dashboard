<?php
   if(isset($_FILES['fileUpload']))
   {
      date_default_timezone_set("Brazil/East");

      $name = $_FILES['fileUpload']['name']; //Atribui uma array com os nomes dos arquivos à variável
      $tmp_name = $_FILES['fileUpload']['tmp_name']; //Atribui uma array com os nomes temporários dos arquivos à variável
      $size = $_FILES["fileUpload"]["size"];

      $allowedExts = array(".gif", ".jpeg", ".jpg", ".png", ".bmp"); //Extensões permitidas

      $dir = '../../files/';

      for($i = 0; $i < count($name); $i++) //passa por todos os arquivos
      {
        move_uploaded_file($name[$i], $dir.$name[$i]); //Fazer upload do arquivo

        $sqlInsertFile = "INSERT INTO `files` (`conta`, `name`, `size`) VALUES (".$row['id'].", '".$name[$i]."', '".$size[$i]."')";
		$resultadoInsertFile = mysql_query($sqlInsertFile, $conexao) or die ("Erro na seleção da tabela.");
	  }
   }
?>