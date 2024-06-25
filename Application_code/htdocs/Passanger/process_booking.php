<?php
session_start();
require_once('../setup/dbcon.php');

// Check if the user is logged in, if not, redirect to the login page
if (!isset($_SESSION["id"])) {
    header("Location: ../index.php");
    exit;
}

// Retrieve form data
$did = $_POST['did'];
$pickupLocation = $_POST['pickupLocation'];
$phone = $_POST['phone'];
$destination = $_POST['destination'];
$vehicleType = $_POST['vehicleType'];
$pickupDate = $_POST['pickupDate'];
$pickupTime = $_POST['pickupTime'];
$dropoffTime = $_POST['dropoffTime'];
$dropoffDate = $_POST['dropoffDate'];

// Insert booking data into the 'request' table
$sql = "INSERT INTO request (did, id, pickuplo, phone, destination, vtype, pickupDate, pickupTime, dropoffTime, dppdate) 
        VALUES ('$did', '{$_SESSION["id"]}', '$pickupLocation', '$phone', '$destination', '$vehicleType', '$pickupDate', '$pickupTime', '$dropoffTime', '$dropoffDate')";

if ($conn->query($sql) === TRUE) {
    $requestID = $conn->insert_id;
    $_SESSION['requestID'] = $requestID;
    header("Location: ../Passanger/bookingststus.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
