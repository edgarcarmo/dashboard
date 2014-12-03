<?php
  function receberPagina($pagina){
    $pagina = explode("/", $pagina);
    $pagina = end($pagina);
    $pagina = explode(".", $pagina);
    return $pagina[0];
  }

  function replaceAll($str){
  	$str = str_replace(".", "", $str);
  	$str = str_replace("-", "", $str);
  	$str = str_replace("/", "", $str);
  	$str = str_replace("(", "", $str);
  	$str = str_replace(")", "", $str);
  	return $str;
  }

  function mask($val, $mask){
    $maskared = '';
    $k = 0;
    for($i = 0; $i<=strlen($mask)-1; $i++){
      if($mask[$i] == '#'){
        if(isset($val[$k])) $maskared .= $val[$k++];
      } else {
        if(isset($mask[$i])) $maskared .= $mask[$i];
      }
    }
    return $maskared;
  }

  function valid9digito($val){
    return strlen($val)==11?mask($val,'(##) #####-####'):mask($val,'(##) ####-####');
  }

  function moeda($get_valor) {
    $source = array('.', ','); 
    $replace = array('', '.');
    $valor = str_replace($source, $replace, $get_valor); //remove os pontos e substitui a virgula pelo ponto
    return $valor; //retorna o valor formatado para gravar no banco
  }

  function sanitizeString($string) {
    // matriz de entrada
    $what = array( 'ä','ã','à','á','â','ê','ë','è','é','ï','ì','í','ö','õ','ò','ó','ô','ü','ù','ú','û','À','Á','É','Í','Ó','Ú','ñ','Ñ','ç','Ç',' ','-','(',')',',',';',':','|','!','"','#','$','%','&','/','=','?','~','^','>','<','ª','º' );
    // matriz de saída
    $by   = array( 'a','a','a','a','a','e','e','e','e','i','i','i','o','o','o','o','o','u','u','u','u','A','A','E','I','O','U','n','n','c','C','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_' );
    // devolver a string
    return str_replace($what, $by, $string);
  }
?>