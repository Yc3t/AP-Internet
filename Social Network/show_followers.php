<?php

$l = mysqli_connect("localhost","root","","social");

if(!isset($_COOKIE['userid'])){
  header('Location: index.php');
  exit;
}
$userid = $_COOKIE['userid'];

// fetch followers

$query = "SELECT Fans.id_usuario, Usuarios.nick FROM Fans JOIN Usuarios WHERE Fans.id_sigue = $userid AND Fans.id_usuario = Usuarios.id";

$result = mysqli_query($l,$query);


echo "<h2>Your followers</h2>";
echo '<table border = "1">';

while ($row = mysqli_fetch_assoc($result)){
  echo '
    <tr>
    <td>
  <a href="info.php?id=' . $row['id_usuario'] . '">' . $row['nick'] . '</a>

    </td>
    </tr>
    ';
}

mysqli_free_result($result);

?>
