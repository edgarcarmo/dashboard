<?php
    $_UP['pasta'] = '../../files/';
    $arquivo = $_UP['pasta'].$_GET['arquivo'];
    // faz o teste se a variavel não esta vazia e se o arquivo realmente existe
    if(isset($arquivo)){
      // verifica a extensão do arquivo para pegar o tipo
      switch(strtolower(substr(strrchr(basename($arquivo),"."),1))){
        case "txt": $tipo="application/txt"; break;
        case "pdf": $tipo="application/pdf"; break;
        case "zip": $tipo="application/zip"; break;
        case "rar": $tipo="application/zip"; break;
        case "doc": $tipo="application/msword"; break;
        case "docx": $tipo="application/msword"; break;
        case "xls": $tipo="application/vnd.ms-excel"; break;
        case "xlsx": $tipo="application/vnd.ms-excel"; break;
        case "ppt": $tipo="application/vnd.ms-powerpoint"; break;
        case "pptx": $tipo="application/vnd.ms-powerpoint"; break;
        case "gif": $tipo="image/gif"; break;
        case "png": $tipo="image/png"; break;
        case "jpg": $tipo="image/jpg"; break;
      }
      header("Content-Type: ".$tipo); // informa o tipo do arquivo ao navegador
      header("Content-Length: ".filesize($arquivo)); // informa o tamanho do arquivo ao navegador
      header("Content-Disposition: attachment; filename=".basename($arquivo)); // informa ao navegador que é tipo anexo e faz abrir a janela de download, tambem informa o nome do arquivo
      readfile($arquivo); // lê o arquivo exit; // aborta pós-ações
    }
?>