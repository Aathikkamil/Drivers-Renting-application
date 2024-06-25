<html lang="en">
<head>
    <?php require_once('../driversetup/head.php') ?>

    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-image: url('../assets/dv.jpg');
            backdrop-filter: blur(5px);
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            padding: 50px 10px 10px; /* Top padding set to 50px, other paddings remain as 10px */
            display: flex;
            justify-content: center;
            align-items: center;
            height: auto;
        }

        .container {
            width: 90%;
            max-width: 600px;
            background-color: rgba(255, 255, 255, 0.7);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin: 10px 0; /* Add some margin between booking requests */
            display: flex;
            flex-direction: column; /* Set the direction to column to stack cards vertically */
            align-items: center; /* Center the cards horizontally */
        }

        .outer-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            background-color: rgba(200, 255, 255, 0.7);
            margin: 10px 0; /* Add some margin between cards */
            width: 100%; /* Make the cards take the full width of the container */
        }

        h1 {
            font-size: 40px;
            font-weight: bold;
            text-align: center;
            color: #333;
            margin: 10px 0;
        }

        p {
            font-family: 'Times New Roman', sans-serif;
            font-size: 20px;
            line-height: 1.5;
            color: #333;
            margin: 10px 0;
        }

        .inner-card {
            border: 1px solid #ccc;
            border-radius: 15px;
            padding: 20px;
            background-color: rgba(75, 255, 255, 0.7);
        }

        .alert-box {
            background-color: rgba(200, 255, 255, 0.7);
            border: 5px solid #ccc;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: black;
            width: 300px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<br><br>
<?php require_once('../driversetup/navbar.php') ?><br><br><br><br>

<?php
session_start();
if (!isset($_SESSION["did"])) {
    echo '<h2> User not logged in </h2>';
    echo ' <h3> Please log in first </h3>';
    echo '<meta http-equiv="refresh" content="1;URL=../index.php"/>';
    die;
}
?>

<?php
require_once('../setup/dbcon.php');

// Retrieve and display booking requests for the logged-in driver
$driverID = $_SESSION["did"];

$sql = "SELECT request.*, user.name AS Name FROM request
        LEFT JOIN user ON request.id = user.id
        WHERE request.did = '$driverID' AND request.status = 'Pending'";

$result = $conn->query($sql);

// Get the request ID that was processed (accepted or rejected)
$processedRequestID = isset($_GET['processed_request']) ? $_GET['processed_request'] : null;

if ($result->num_rows > 0) {
    echo '<div class="container">'; // Start a container for vertical alignment
    while ($row = $result->fetch_assoc()) {
        // Skip the request that was processed
        if ($row['requestID'] == $processedRequestID) {
            continue;
        }

        $Pick = $row['pickuplo'];
        $request_id = $row['requestID'];
        $phone = $row['phone'];
        $dest = $row['destination'];
        $vtype = $row['vtype'];
        $pickup = $row['pickupTime'];
        $date = $row['pickupDate'];
        $drop = $row['dropoffTime'];
        $dated = $row['dppdate'];
        $passengerName = $row['Name'];

        // Display each booking request as a vertical card
        echo '<div class="outer-card">';
        echo '<div class="inner-card">';
      
        echo '<h1>Booking request</h1>';
        echo '<p>Vehicle Owner Name: ' . $passengerName . '</p>';
        echo '<p>Contact: ' . $phone . '</p>';
        echo '<p>Pick-up location: ' . $Pick . '</p>';
        echo '<p>Destination: ' . $dest . '</p>';
        echo '<p>Vehicle to be driven: ' . $vtype . '</p>';
        echo '<p>Customer Pickup time: ' . $pickup . '</p>';
        echo '<p>Date: ' . $date . '</p>';
        echo '<p>Drop off Time: ' . $drop . '</p>';
        echo '<p>Date: ' . $dated . '</p>';

        // Buttons for accepting and rejecting
        echo '<form method="POST" action="accept_reject_booking.php">';
        echo '<input type="hidden" name="request_id" value="' . $row['requestID'] . '">';
        echo '<button type="submit" name="accept" value="Accepted">Accept</button>';
        echo '<button type="submit" name="reject" value="Rejected">Reject</button>';
        echo '</form>';

        echo '</div>';
        echo '</div>';
    }
    echo '</div>'; // Close the container
} else {
    echo '<div class="alert-box">
        <h1>No booking requests found!</h1>
    </div>';
}

$conn->close();
?>

</body>
</html>