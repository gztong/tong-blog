<?php
  require_once("../php/db.php");

  $errors = array();
  $data = array();

  $_POST = json_decode(file_get_contents('php://input'), true);

  // checking for blank values.
  if (empty($_POST['name']))
    $errors['name'] = 'Name is required.';

  if (empty($_POST['text']))
    $errors['text'] = 'text is required.';

  if (empty($_POST['mail']))
    $errors['mail'] = 'Email is required.';

  if (!empty($errors)) {
    $data['errors']  = $errors;
  } else {
    $data['message'] = 'Form data is going well';
  }


  $name = $_POST['name'];
  $email = $_POST['mail'];
  $text = $_POST['text'];

  $mysqli->query("INSERT INTO messages (name, email, msg) VALUES ('$name', '$email', '$text') ");

  // response back.
  echo json_encode($data);

?>