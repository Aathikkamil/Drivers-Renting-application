<style>
    body {
        font-family: Arial, sans-serif;
        background-image: url('../assets/dv.jpg');
        backdrop-filter: blur(5px);
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        margin: 0;
        padding: 0;
    }

    .card {
        background-color: rgba(255, 255, 255, 0.5);
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin: 20px;
        max-width: 600px;
        margin: 0 auto;
        text-align: center;
    }
    .inner-card {
            border: 1px solid #ccc;
            max-width: 100%;
            border-radius: 15px;
            padding: 20px; /* Increase the padding to make the cards bigger */
            background-color: rgba(755, 255, 355, 0.5);
            margin: 10px 0;
        }
        
        .outer-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin: 10px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            background-color: rgba(200, 255, 255, 0.5);
        }
        .container {
            max-width: 90%;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.5); /* Adjust the last value (0.5) for transparency */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

</style>

<?php
session_start();
require_once('../setup/dbcon.php');

// Check if the requestID is set in the session
if (isset($_SESSION['requestID'])) {
    $requestID = $_SESSION['requestID'];

    // Query the database to get the status of the specific requestID
    $statusQuery = "SELECT status FROM request WHERE requestID = $requestID";
    $statusResult = $conn->query($statusQuery);

    if ($statusResult && $statusResult->num_rows > 0) {
        $statusRow = $statusResult->fetch_assoc();
        $status = $statusRow["status"];
        echo '<div class="container">';
        echo '<div class="outer-card">';
        echo '<div class="inner-card">'; // Opening the card container

        // Display messages based on the status
        if ($status == "Accepted") {
            echo "<h1>Your request has been accepted. You have booked the driver.</h1>";
            echo '<meta http-equiv="refresh" content="5;URL=../Passanger/rview.php">';
        } elseif ($status == "Rejected") {
            echo "<h1>Your request has been rejected. Book another driver .</h1>";
            // You can add a link to go back to the booking page if needed.
            
            echo '<meta http-equiv="refresh" content="5;URL=../Passanger/find.php">';
        } elseif ($status == "pending") {
            echo "<h1>Your request is pending. Please wait for confirmation.</h1>";
        } else {
            echo "<h1>Invalid status: $status</h1>";
        }

        echo '</div>'; // Closing the card container
        echo '</div>'; // Closing the card container
    } else {
        echo "<div class='card'><h1>Request not found in the database.</h1></div>";
    }
} else {
    echo "<div class='card'><h1>RequestID not set in the session.</h1></div>";
}

$conn->close();
?>
