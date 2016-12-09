<?php
    require_once("./db.php");
    session_start();
    if($_SESSION['user']){
    }else{
        header("location:login.php");
    }

    $role = $mysqli->real_escape_string($_POST['role']);
    $team = $mysqli->real_escape_string($_POST['team']);
    $time = $mysqli->real_escape_string($_POST['time']);
    $location = $mysqli->real_escape_string($_POST['location']);
    $image = $mysqli->real_escape_string($_POST['image']);
    $url = $mysqli->real_escape_string($_POST['url']);
    $github = $mysqli->real_escape_string($_POST['github']);
    $demo = $mysqli->real_escape_string($_POST['demo']);
    $description = $mysqli->real_escape_string($_POST['description']);

    $public = 0;
    foreach($_POST['public'] as $each_check) //gets the data from the checkbox
    {
        if($each_check !=null ){ //checks if the checkbox is checked
            $public = 1; //sets teh value
        }
    }
    $mysqli->query("INSERT INTO experiences (role, team, time, location, image, url, github, demo, description, public) VALUES ('$role','$team','$time','$location', '$image', '$url', '$github', '$demo', '$description', '$public')"); //SQL query
    
    header("location: admin.php");
?>