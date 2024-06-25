<?php
session_start();
require_once('../setup/dbcon.php');

// Check if the user is logged in
if (!isset($_SESSION["id"])) {
    // Redirect to the login page if not logged in
    header("Location: ../index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $driverID = $_SESSION['did']; // Assuming you have driverID in the session
    $userID = $_SESSION["id"];
    $rating = $_POST["rating"];
    $userReview = $_POST["user_review"];
    
    // Get the sentiment result from the hidden paragraph
    $sentimentReview = $_POST["sentiment-review"];


    // Define the SQL statement
    $insertReviewSQL = "INSERT INTO driver_user_intraction (did, id, user_review, rating, sentimentreview) VALUES (?, ?, ?, ?, ?)";

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare($insertReviewSQL);

    if ($stmt) {
        $stmt->bind_param("iisss", $driverID, $userID, $userReview, $rating, $sentimentReview);
      
        if ($stmt->execute()) {
            echo "<h1>Review submitted successfully!</h1>";
            echo '<meta http-equiv="refresh" content="1;URL=../Passanger/passanger_home.php">';
            // You can redirect the user to a confirmation page or the driver's profile page.
        } else {
            echo "Error submitting the review: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing the SQL statement: " . $conn->error;
    }

    $conn->close();
}

?>
