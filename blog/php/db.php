<?php 
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = 'gangzheng';
$DB_NAME = 'first_db';
$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
$mysqli->set_charset("utf8");
?>
