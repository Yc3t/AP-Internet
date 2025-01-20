<?php
$pdo = new PDO('mysql:host=localhost;dbname=redsocial', "root", "");


if (!isset($_COOKIE['session'])) {
  die("Accesso denegado");
}
// Initialize variables
$comments = [];
$idfoto = '';

// Check if the photo ID is provided via GET
if (isset($_GET['id'])) {
  $idfoto = $_GET['id'];

  // Query to fetch comments for the photo
  $query = 'SELECT comentarios.*, usuarios.nombre 
              FROM comentarios 
              JOIN usuarios ON comentarios.dni = usuarios.dni 
              WHERE comentarios.idfoto = :idfoto';
  $stmt = $pdo->prepare($query);
  $stmt->execute(['idfoto' => $idfoto]);
  $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
  die("ID de foto no proporcionado.");
} ?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Comentarios de la Foto</title>
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

    a {
      color: #007bff;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <h1>Comentarios de la foto</h1>



    <?php if (!empty($comments)): ?>

    <table>

    <tr>
      <th>Nombre</th>
      <th>Comentario</th>
    </tr>

<?php foreach ($comments as $comment): ?>

    <tr>
      <td><?php echo htmlspecialchars($comment['nombre'])?></td>
      <td><?php echo htmlspecialchars($comment['textocomentario'])?></td>


    </tr>



      <?php endforeach; ?>

    </table>
  
<?php else : ?>
<p>No Comments in this photo.</p>

  <?php endif; ?>



</body>

</html>
