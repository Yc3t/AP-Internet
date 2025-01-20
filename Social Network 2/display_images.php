<?php
$pdo = new PDO('mysql:host=localhost;dbname=redsocial','root','');

if (!isset($_COOKIE['session'])){
  die("Accesso denegado");
}

$dniuser= "";
$photos = [];


if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dniuser'])){
  $dniuser = $_POST['dniuser'];

  //query to fetch user's photos
  $query = 'SELECT * FROM fotos WHERE dni = :dni' ;
  $stmt = $pdo->prepare($query);
  $stmt ->execute(['dni'=>$dniuser]);
  $photos = $stmt ->fetchAll(PDO::FETCH_ASSOC);

}



?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fotos del Usuario</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    table,
    th,
    td {
      border: 1px solid #ddd;
    }

    th,
    td {
      padding: 10px;
      text-align: left;
    }

    th {
      background-color: #f4f4f4;
    }

    img {
      max-width: 100px;
      height: auto;
    }

    a {
      color: #007bff;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
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
    <h1> Fotos del Usuario </h1>
    <form method="post" action="">
      <label for="dniuser">DNI del Usuario</label>
      <input type="text" id="dniuser" name="dniuser" value="<?php echo htmlspecialchars($dniuser); ?>" required>
      <input type="submit" value="Buscar">
    </form>

<?php if(!empty($photos)):?>
    <table>
      <tr>
        <th>Imagen</th>
        <th>Fecha</th>
        <th>Comentarios</th>
      </tr>

    <?php foreach ($photos as $photo): ?>

    <tr>
      <td><img src="<?php echo htmlspecialchars($photo['url'])?>"></td>
        <td><?php echo htmlspecialchars($photo['fecha'])?></td>
       <td><a href="verCom.php?id=<?php echo htmlspecialchars($photo['idfoto']); ?>">Ver comentarios</a></td>  </tr>
<?php endforeach; ?>

    </table>


    <?php elseif($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
    <p>No se encontraron fotos para este usuario</p>


    <?php endif;?>
</body>


</html>
