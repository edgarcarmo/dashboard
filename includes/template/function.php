<?php
  function receberPagina($pagina){
    $pagina = explode("/", $pagina);
    $pagina = end($pagina);
    $pagina = explode(".", $pagina);
    return $pagina[0];
  }
?>