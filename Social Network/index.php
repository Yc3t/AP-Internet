<?php
session_start();
//login process

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  $user = $_POST['username'];
  $password = $_POST['password'];


  if($user === 'hola' && $password == 'hola12345'){
    //set a cookie
    setcookie('userid', 1, time()+3600,'/');
    header('Location: dashboard.php');
    exit;
  } else{
    echo "Invalid!";
  }



}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="post" action="index.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
