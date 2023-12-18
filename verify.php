<?php
session_start();
include 'config.php';

function checkLogin(mysqli $db): bool {
   $username = $_GET['email'];
   $password = $_GET['password'];
 
   
$query = "SELECT * FROM users WHERE email = '$username' AND password = '$password'";
$result = $mysqli->query($query);}

if ($result) {
    if ($result->num_rows > 0) {
        $obj = $result->fetch_object();
        $_SESSION['username'] = $username;
        $_SESSION['type'] = $obj->type;
        $_SESSION['id'] = $obj->id;
        $_SESSION['fname'] = $obj->fname;
        header("location: index.php");
    } else {
        echo '<h1>Invalid Login! Redirecting...</h1>';
        header("Refresh: 3; url=index.php");
    }
} else {
    die($mysqli->error);
}

$mysqli->close();
?>