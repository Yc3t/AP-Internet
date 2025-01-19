<?php
// info.php
session_start();

// Check if the user is logged in
if (!isset($_COOKIE['userid'])) {
    header('Location: login.php');
    exit;
}

$l = mysqli_connect("localhost","root","","social");

$follower_id = $_GET['id'];

// Fetch the number of users the follower is following
$query = "SELECT COUNT(id_sigue) AS c FROM Fans WHERE id_usuario = $follower_id";
$result = mysqli_query($l, $query);
$row = mysqli_fetch_assoc($result);
echo "Number of users followed: " . $row['c'] . "<br>";

// Fetch the follower's messages
$query = "SELECT mensaje, fecha FROM Mensajes WHERE id_usuario = $follower_id ORDER BY fecha DESC";
$result = mysqli_query($l, $query);

echo '<table border="1">';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr><td>' . $row['mensaje'] . '</td><td>' . $row['fecha'] . '</td></tr>';
}
echo '</table>';

mysqli_free_result($result);
?>
