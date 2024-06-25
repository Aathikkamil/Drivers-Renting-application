<?php
session_start();

if (!isset($_SESSION["did"])) {
    echo '<h2> User not logged in </h2>';
    echo ' <h3> Please log in first </h3>';
    echo '<meta http-equiv="refresh" content="1;URL=../index.php"/>';
    die;
}

require_once('../setup/dbcon.php'); // Include your database connection file

if (isset($_POST['request_id']) && isset($_POST['accept'])) {
    // Request ID and action to accept
    $request_id = $_POST['request_id'];
    
    // Update the status to "Accepted" in the database
    $sql = "UPDATE request SET status = 'Accepted' WHERE requestID = '$request_id'";
    if ($conn->query($sql) === TRUE) {
        // Successful update

        // Show a success message
        echo '<div style="background-color: #4CAF50; color: white; padding: 10px; text-align: center;">Request Accepted Successfully</div>';

        // Redirect back to the previous page after a delay
        header("refresh:5;url=booking_request.php?processed_request=$request_id"); // Pass the processed request ID to remove it
        exit;
    } else {
        // Handle the update error
        echo "Error updating status: " . $conn->error;
    }
} elseif (isset($_POST['request_id']) && isset($_POST['reject'])) {
    // Request ID and action to reject
    $request_id = $_POST['request_id'];

    // Update the status to "Rejected" in the database
    $sql = "UPDATE request SET status = 'Rejected' WHERE requestID = '$request_id'";
    if ($conn->query($sql) === TRUE) {
        // Successful update

        // Show a success message
        echo '<div style="background-color: #F44336; color: white; padding: 10px; text-align: center;">Request Rejected Successfully</div>';

        // Redirect back to the previous page after a delay
        header("refresh:5;url=booking_request.php?processed_request=$request_id"); // Pass the processed request ID to remove it
        exit;
    } else {
        // Handle the update error
        echo "Error updating status: " . $conn->error;
    }
}

$conn->close();
?>
