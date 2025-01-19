<?php
session_start();

// Check if the 'userid' cookie exists
if (isset($_COOKIE['userid'])) {
    // Access the 'userid' cookie value
    $userid = $_COOKIE['userid'];
    echo "User ID from cookie: " . $userid;
} else {
    echo "Cookie 'userid' is not set.";
}
?>
