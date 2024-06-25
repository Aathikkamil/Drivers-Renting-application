<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('../setup/head.php'); ?>
    <?php require_once('../driversetup/navbar.php'); ?><br><br><br>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-image: url('../assets/bg.jpg');
            backdrop-filter: blur(5px);
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
        }

        h3 {
            text-align: center;
            color: #333;
        }

        .card-container {
            max-width: 70%; /* Adjusted the max-width to 70% */
            margin: 100px auto; /* Center-align the cards */
        }

        .outer-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px 80px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            background-color: rgba(200, 255, 255, 0.5);
            margin: 10px 80px;
        }

        .inner-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            background-color: rgba(255, 255, 355, 0.5);
            margin: 10px 80px;
        }

        p {
            color: #555;
        }

        /* Define CSS for the star icons */
        .star-rating {
            font-size: 24px;
        }

        .star {
            font-size: 32px;
            color: #ccc;
        }

        .filled {
            color: #FFD700;
        }

        .name {
            font-size: 18px;
            color: #555;
        }

        .user-reviews-table {
            width: 100%; /* Set the table width to 100% */
            margin: 0 auto; /* Center-align the table */
        }        
        
        .alert-box {
  background-color: rgba(200, 255, 255, 0.7);
  border: 5px solid #ccc;
  padding: 30px;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
 
  color: black; /* Set the text color to black for better contrast with the white background */
  width: 300px; /* Adjust the width as needed */
  margin: 0 auto; /* Center the box horizontally */
}

    </style>
</head>
<body>
<?php
session_start();

if (isset($_SESSION["did"]) && isset($_SESSION["name"])) {
    $driverID = $_SESSION["did"];
    $userName = $_SESSION["name"];
    echo '<title>Welcome, ' . $userName . '</title';

    // Query the database to retrieve the user's details from the "user" table
    require_once('../setup/dbcon.php');

    // Query the database to retrieve the driver's reviews from the "driver_user_intraction" table
    $sql = "SELECT DU.*, U.* 
    FROM driver_user_intraction DU
    JOIN user U ON DU.id = U.id
    WHERE DU.did = $driverID";

    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $totalRating = 0;
        $totalRatingsCount = 0;

        while ($row = $result->fetch_assoc()) {
            // Calculate the sum of ratings and total number of ratings
            $totalRating += intval($row['rating']);
            $totalRatingsCount++;
        }
        if ($totalRatingsCount > 0) {
            $averageRating = $totalRating / $totalRatingsCount;
        } else {
            $averageRating = 0;
        }
        echo '<div class="card-container">';

        echo '<div class="outer-card">';
        echo '<div class="inner-card">';
        $ratingCounts = array(0, 0, 0, 0, 0);
        echo '<table class="user-reviews-table">';
        echo '<tr>';
        echo '<td> <h1>' . number_format($averageRating, 2) . ' /5   </h1><br>  ' . $totalRatingsCount . ' Ratings</td>';
        echo '<td>' . getStarRatingHtml($averageRating) . '</td>';
        $result->data_seek(0); // Reset the result pointer to the beginning
        while ($row = $result->fetch_assoc()) {
            $individualRating = $row['rating'];
            $ratingCounts[$individualRating - 1]++; // Ratings are 1 to 5, so we use -1 to match array index.
        }

        echo '<td>';
        for ($i = 5; $i >= 1; $i--) {
            echo '<p>' . '   ' . $i . 'stars-    ' . $ratingCounts[$i - 1];
        }
        echo '</td>';
        echo '</tr>';
        echo '</table>';
        $ratings = [5 => 0, 4 => 0, 3 => 0, 2 => 0, 1 => 0];
        echo '</div>';
    }

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $reviews = $row['user_review'];
            $rate = $row['rating'];
            $sentiment = $row['sentimentreview'];
            $name = $row['name'];
            echo '<div class="outer-card">';
            echo '<div class="inner-card">';
            echo '<p class="card-text star-rating">' . getStarRatingHtml($rate) . '</p>';
            echo '<p class="card-text name"> By: ' . $name . '</p>';
            echo '<p class="card-text">Review: ' . $reviews . '</p>';
            echo '<p class="card-text">Sentiment: ' . $sentiment . '</p>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
        echo '</div>';
    } else {
        $reviews = array(); // Initialize an empty array if no reviews are found
        echo '<div class="alert-box">
        <h1>No reviews found!</h1>
      </div>';
    }
} else {
    echo 'Driver ID not provided.';
}

// Define a function to generate star rating icons with color based on the rating
function getStarRatingHtml($rating) {
    $starHtml = '<div class="stars">';
    for ($i = 1; $i <= 5; $i++) {
        $starClass = ($i <= $rating) ? 'filled' : '';
        $starHtml .= '<span class="star ' . $starClass . '">&#9733;</span>';
    }
    $starHtml .= '</div>';
    return $starHtml;
}
?>
</body>
</html>
