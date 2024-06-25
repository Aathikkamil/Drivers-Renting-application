
<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "dhmsdb";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die('Connection failed: ' . $mysqli->connect_error);
}
?>