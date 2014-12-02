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
?>