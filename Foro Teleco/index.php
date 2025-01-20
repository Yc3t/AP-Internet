<?php
session_start();

function comprobarClave(string $user,string $password):bool{
  if($user == "hola" && $password=="hola12345"){
    return true;
  }else{
    return false;
  }

}


function iniciarSesion(){
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user = $_POST['user'];
    $password = $_POST['pass'];

    if(comprobarClave($user,$password)){
      setcookie('session',1,time() +604800,'/');
      header('Location: foro.php');
      exit;
    };
  }else{
    "Invalid!";
  }



}

iniciarSesion();



?>

<!DOCTYPE html>
<html>
  <head><title>Foro Teleco</title></head>

  <body>
    <h1>Bienvenido al foro de teleco!</h1>

    <h2>Inicia Sesión</h2>

    <form method="post" action="">
      <label for="user"> Usuario </label>
      <input type="text" id="user" name="user" required>
      <br>
      <br>
      <label for="pass"> Contraseña</label>
      <input type="text" id="pass" name="pass" required>
      <br>
      <button type="submit">Entrar</button>
    </form>

  </body>






</html>
