<?php
require_once('../driversetup/head.php');
session_start();
if (isset($_GET['driverID'])) {
    $driverID = $_GET['driverID'];

    require_once('../setup/dbcon.php');
    
    // Use prepared statements to prevent SQL injection
    $sql = "SELECT * FROM driver WHERE did = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $driverID);
    
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result && $result->num_rows > 0) {
            $totalRating = 0;
            $totalRatingsCount = 0; // Initialize the variable for the total number of ratings

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

            // Define a function to generate star rating icons with color based on the rating
            function getStarRatingHtml($rating) {
                $starHtml = '<div class="star-rating">';
                for ($i = 1; $i <= 5; $i++) {
                    $starClass = ($i <= $rating) ? 'filled' : '';
                    $starHtml .= '<span class="star ' . $starClass . '">&#9733;</span>';
                }
                $starHtml .= '</div>';
                return $starHtml;
            }
            
            // Create arrays to store counts for each rating (5 stars, 4 stars, 3 stars, 2 stars, 1 star)
            $ratingCounts = array(0, 0, 0, 0, 0);
            
            // Display star rating and calculate counts based on the individual ratings
            echo '<table class="user-reviews-table";style="width: 100%;">';
            echo '<tr>';
            echo '<td style="width: 33.33%;"> <h1>' . number_format($averageRating, 2) . ' /5   </h1><br>  '. $totalRatingsCount.' Ratings</td>';
            echo '<td style="width: 33.33%;">' . getStarRatingHtml($averageRating) . '</td>';
            
           
            
            // Calculate counts for each rating and display them
            $result->data_seek(0); // Reset the result pointer to the beginning
            while ($row = $result->fetch_assoc()) {
                $individualRating = $row2['rating'];
                $ratingCounts[$individualRating - 1]++; // Ratings are 1 to 5, so we use -1 to match array index.
            }
            
            echo '<td style="width: 33.33%"; >';
            for ($i = 5; $i >= 1; $i--) {
                echo '<p>'  . '   ' . $i . 'stars-    ' . $ratingCounts[$i - 1];
                
                
            }
            echo '</td>';
            echo '</tr>';
            echo '</table>';
        }
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $driverName = $row["Name"];
            $driverPhone = $row["phone"];
            $driverAge = $row["age"];
            $driverNIC = $row["nic"];
            $driverLicense = $row["licence"];
            $driverVehicleType = $row["vtype"];
            $driverProfile = $row["profile"];
            $driverAddress = $row["address"];
        } else {
            echo 'Driver not found.';
        }

    } else {
        echo 'Error executing the SQL query.';
    }

    // Close the prepared statement for the driver query
    $stmt->close();
    
    
    $conn->close();
    
} else {
    echo 'Driver ID not provided.';
    exit();
}
?>
<body>
    <p>Name: <?php echo $driverName; ?></p>
    <p>Phone: <?php echo $driverPhone; ?></p>
    <p>Age: <?php echo $driverAge; ?></p>
    <p>NIC: <?php echo $driverNIC; ?></p>
    <p>License: <?php echo $driverLicense; ?></p>
    <p>Vehicle Type: <?php echo $driverVehicleType; ?></p>
    <p>Profile: <?php echo $driverProfile; ?></p>
    <p>Address: <?php echo $driverAddress; ?></p>

    <!-- Place the interaction details in a loop where you want in the HTML structure -->

</body>
