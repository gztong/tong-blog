<?php
    require_once("./db.php");
    session_start();
    if($_SESSION['user']){
    }else{
        header("location:login.php");
    }

    $name = $mysqli->real_escape_string($_POST['name']);
    $subtitle = $mysqli->real_escape_string($_POST['subtitle']);
    $appstore = $mysqli->real_escape_string($_POST['appstore']);
    $playstore = $mysqli->real_escape_string($_POST['playstore']);
    $image = $mysqli->real_escape_string($_POST['image']);
    $url = $mysqli->real_escape_string($_POST['url']);
    $github = $mysqli->real_escape_string($_POST['github']);
    $demo = $mysqli->real_escape_string($_POST['demo']);
    $description = $mysqli->real_escape_string($_POST['description']);

    $public = "no";
    // foreach($_POST['public'] as $each_check) //gets the data from the checkbox
    // {
    //     if($each_check !=null ){ //checks if the checkbox is checked
    //         $public = "yes"; //sets teh value
    //     }
    // }
    $mysqli->query("INSERT INTO projects (name, subtitle, appstore, playstore, image, url, github, demo, description, public) VALUES ('$name','$subtitle','$appstore','$playstore', '$image', '$url', '$github', '$demo', '$description', '$public')"); //SQL query

    header("location: admin.php");
?>