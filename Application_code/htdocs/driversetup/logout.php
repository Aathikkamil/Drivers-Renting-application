<?php
// Start the session to access session variables.
session_start();

// Unset all session variables.
$_SESSION = array();

// Destroy the session.
session_destroy();

// Redirect the user to the login page or any other desired location.
header("Location: ../driver/log.php");
exit(); // Ensure that no other code is executed after the redirect.
?>
