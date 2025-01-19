<?php
// show_messages.php

// Check if the user is logged in
if (!isset($_COOKIE['userid'])) {
    header('Location: login.php');
    exit;
}

$l = mysqli_connect("localhost","root","","social");

$follower_id = $_COOKIE['userid'];

$query = "SELECT COUNT(id_sigue) as x from FANS WHERE id_usuario = 1";
$result = mysqli_query($l,$query);

$found = mysqli_fetch_assoc($result);

echo "<h3>Number of users followed: " . $found['x'] . "<br>";



$query = "SELECT mensaje, fecha FROM Mensajes WHERE id_usuario=$follower_id ORDER BY fecha DESC";

$result = mysqli_query($l,$query);

echo '<h2> Your Messages </h2>';
echo '<table border = "3">';

while($row = mysqli_fetch_assoc($result)){
  echo '<tr>
  <td>' .
  $row['mensaje'] . '</td><td>' . $row['fecha'].  '</td><td>'
  ;

}

echo '</table>';




mysqli_free_result($result);



?>
