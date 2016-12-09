<?php
  require_once "../php/db.php";

  if(isset($_GET['table'])){
    $table = $mysqli->real_escape_string($_GET['table']);
    $query = "SELECT * FROM $table";
    $result = $mysqli->query($query);

    if (!$result) { // add this check.
        die('Invalid query: ' . mysql_error());
    }
    $arr = array();
    while($row = $result->fetch_assoc()){   
      $arr[] = $row;
    }
    # JSON-encode the response
   echo $json_response = json_encode($arr);
  }
?>