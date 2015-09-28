<?php
include "app/db.php";
include "app/jsonp.php";

$action = $_GET['action'];

switch ($action) { 
  case "increment":
    $incremented_count = $_GET['count']+1;
    set_page_count($_GET['url'], $incremented_count);
    jsonp("handleResponse", array('count' => $incremented_count, 'url' => $_GET['url']));
    break;
}


?>