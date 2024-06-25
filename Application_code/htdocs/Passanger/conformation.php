<?php
session_start();

require_once('../setup/dbcon.php');

// Check if the requestID is set in the session
if (isset($_SESSION['requestID'])) {
    $requestID = $_SESSION['requestID'];

    // Query the database to check the status of the specific requestID
    $statusQuery = "SELECT status FROM request WHERE requestID = $requestID";
    $statusResult = $conn->query($statusQuery);

    if ($statusResult && $statusResult->num_rows > 0) {
        $statusRow = $statusResult->fetch_assoc();
        $status = $statusRow["status"];

        if ($status == "accepted") {
            // Display the success message
            echo "Booking successful! Your request has been accepted.";
        } else {
            echo "Booking successful! Your request is pending or declined.";
        }
    } else {
        echo "Request not found in the database.";
    }
} else {
    echo "RequestID not set in the session.";
}

$conn->close();
?>
