<?php

function jsonp($callbackname, $data) { 
  
  header("Content-Type: text/javascript");
  echo($callbackname . '(' . json_encode($data) . ')');
  
}

?>