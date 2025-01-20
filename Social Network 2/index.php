<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dni'])) {
    $session = $_POST['dni'];

    // Set a cookie with the DNI (valid for 15 minutes)
    setcookie('session', $session, time() + 9000, '/');

    // Redirect to display_images.php
    header('Location: display_images.php');
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    form {
      margin-top: 20px;
    }

    input[type="text"] {
      padding: 8px;
      width: 200px;
    }

    input[type="submit"] {
      padding: 8px 16px;
      background-color: #007bff;
      color: white;
      border: none;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
    }
  </style>
</head>

  <body>
    <h1> Iniciar Sesion </h1>

    <form method="post" action="">
      <label for="dni">DNI del Usuario</label>
      <input type="text" id="dni" name ="dni" required>
      <input type="submit" value="Iniciar Sesión">

    </form>

    

</body>








</html>
