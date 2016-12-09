<?php
  require_once("./db.php");
  session_start();
  $username = $mysqli->real_escape_string($_POST['username']);
  $password = $mysqli->real_escape_string($_POST['password']);

  $query = $mysqli->query("SELECT * FROM users WHERE username='$username'");
  $table_password = "";

  if($query->num_rows>0){
    while( $row = $query->fetch_array() ){
      $table_password = $row['password'];
    }
    if($password == $table_password){
       $_SESSION['user'] = $username;
       header("location: admin.php");
    }else{
      Print "<script> alert('Incorrect Password!!!') </script>";
      Print "<script> window.location.assign('login.php') </script>";
    }
  }else{
      Print "<script> alert('Incorrect Username!!!') </script>";
      Print "<script> window.location.assign('login.php') </script>";
  }

?>