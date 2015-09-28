<?php

function get_conn() {
  $host = "it-www";
  $user = "admin";
  $password = "admin";
  $db = "wp_dev";
  $conn = mysqli_connect($host, $user, $password, $db);

  if (mysqli_connect_errno($conn)) {
    echo "Failed to connect to MySQL: " + mysqli_connect_error();
  }

  return $conn;
  
}

/* get the page count for the url passed */
function get_page_count($url) { 
  
  $conn = get_conn();
  
  if (mysqli_connect_errno($conn)) { 
    echo "Failed to connect to MySQL: " + mysqli_connect_error();
  }
  
  
  $res = $conn->query("SELECT count FROM click WHERE url = '" . mysql_escape_string($url) . "'" );
  
  if ($res === false) { 
    trigger_error("Error running SQL: " . $conn->error, E_USER_ERROR);
  }
  else { 
    $arr = $res->fetch_all(MYSQL_ASSOC);
  }
  
  // returns an array of results, we only want the first one
  return $arr[0];
}


/* set the page count for passed url, return nothing */
function set_page_count($url, $count) { 

  $conn = get_conn();
  
  $res = $conn->query("UPDATE click SET count ='" . $count . "' WHERE url = '" . mysql_escape_string($url) . "'" );
  
  
  if ($res === false) { 
    trigger_error('Error running SQL' . $conn->error, E_USER_ERROR);
  }
  
}
?>