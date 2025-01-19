<?php
session_start();


// check if user is logged in 
if(!isset($_COOKIE['userid'])){
  header('Location: index.php');
  exit;
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
  <body>
    <h1>Welcome to your dashboard</h1>
    <h2>Send a message</h2>
    <form action="send.php" method="post">
      <input name="id" type="text" value="<?php echo htmlspecialchars($_COOKIE['userid']);?>"><br>
      <textarea maxlength="200" name="text" placeholder="Write your message"></textarea><br>
      <button type="submit">Send</button>

    </form>

</body>
</html>
