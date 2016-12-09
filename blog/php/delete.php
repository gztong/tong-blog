<?php

  require_once("./db.php");
  session_start(); //starts the session
  if($_SESSION['user']){ //checks if user is logged in
  }
  else{
    header("location:login.php"); // redirects if user is not logged in
  }

  if($_SERVER['REQUEST_METHOD'] == "GET")
  {
    $id = mysql_real_escape_string($_GET['id']);
    $table = mysql_real_escape_string( $_GET['table'] );
    $mysqli->query("DELETE FROM $table WHERE id=$id");
     
    header("location: admin.php");
  }
?>