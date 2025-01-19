<?php
session_start();

if(!isset($_COOKIE['userid'])){
  header('Location: index.php');
  exit;
}

//Connect to db

$l = mysqli_connect("localhost","root","","social");

//Insert the message

$userid = $_POST['id'];

//sanitize input
$message = mysqli_real_escape_string($l,$_POST['text']);

$query = "INSERT INTO Mensajes (id_usuario, mensaje, fecha) VALUES ($userid, '$message', NOW())";

mysqli_query($l,$query);


//redirect back to dashboard
header('Location: dashboard.php');
exit;


?>
