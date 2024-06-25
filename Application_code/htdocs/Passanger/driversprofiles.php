<!DOCTYPE html>
<html lang="en">
<head>
    <title>Driver Profile</title>
    <?php require_once('../setup/head.php'); ?>
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

        .container {
    max-width: 800px;
    margin: 0 auto;
    background-color: rgba(255, 255, 255, 0.5); /* Adjust the last value (0.5) for transparency */
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}
.outer-card img {
            max-width: 100%;
            border-radius: 50%;
        }


        h3 {
            text-align: center;
            color: #333;
        }

        .outer-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin: 10px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            background-color: rgba(200, 255, 255, 0.5);
        }
         img {
    display: flex;
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
    /* Add other styling for the outer-card if needed */
}

        .inner-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            background-color: rgba(255, 255, 355, 0.5);
            margin: 10px 0;
        }

        p {
            color: #555;
        }

        /* Define CSS for the star icons */
        .star-rating {
            font-size: 24px;
        }

        .star {
            color: #ccc; /* Default star color */
        }

        .filled {
            color: #FFD700; /* Color for filled stars (adjust as needed) */
        }

 
    </style>
       <script>
        function updateRatingCount() {
            const rating = document.querySelector('input[name="rating"]:checked').value;
            document.getElementById('ratingCount').textContent = rating;
        }
    </script>
</head>
<body>
<?php
    session_start();
    if(!isset($_SESSION["id"])){
      echo '<h2>  User not logedin  </h2>';
      echo ' <h3> Plese Login First   </h3>';
      echo ' <meta thhp-equvi="refresh" content =1";URL=../index.php/>';
      die;
    
    }
    
      ?>
    <?php require_once('../setup/navbar.php'); ?><br><br>


   
    <div class="container mt-5">
      


 

                <?php
                if (isset($_GET['driverID'])) {
                    $driverID = $_GET['driverID'];
                    

                    // Query the database to retrieve the driver's details based on driverID
                    require_once('../setup/dbcon.php');
                    $sql = "SELECT * FROM driver WHERE did = $driverID";
                    $result = $conn->query($sql);

                    if ($result && $result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo '<div class="outer-card">';
                        echo '<h3 style= "text-align: center">Driver Information</h3>';
                        echo  '<img src="' . $row['profile'] . '" alt="Driver Profile Image" style="max-width: 50%;">';

                        echo '<div class="inner-card">';
                        echo '<p><strong>Driver name: </strong>' . $row['Name'] . '</p>';
                        echo '<p><strong>Contact number: </strong>' . $row['phone'] . '</p>';
                        echo '<p><strong>Driven vehicle: </strong>' . $row['vtype'] . '</p>';
                        echo '<p><strong>Address: </strong>' . $row['address'] . '</p>';
                        echo '<p><strong>Age: </strong>' . $row['age'] . '</p>';
                        echo'<p> <strong>Driving experience: </strong>' . $row['experience'] . '</p>';
                        echo '</div>'; // Close inner card
                        echo '</div>'; // Close outer card
                    } else {
                        echo 'Driver not found.';
                    }


                    echo '<a style="align:center" href="bookadriver.php?driverID=' . $row['did'] . '" class="btn btn-primary"> book the driver</a>';
                 
                    
                    echo' <div  class="outer-card" style="width: 75%;" >';
                    
                    $sql2 = "SELECT DU.*, U.* 
                    FROM driver_user_intraction DU
                    JOIN user U ON DU.id = U.id
                    WHERE DU.did = $driverID";

                    $result2 = $conn->query($sql2);

                    if ($result2 && $result2->num_rows > 0) {
                        $totalRating = 0;
                        $totalRatingsCount = 0; // Initialize the variable for the total number of ratings

                        while ($row2 = $result2->fetch_assoc()) {
                            // Calculate the sum of ratings and total number of ratings
                            $totalRating += intval($row2['rating']);
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
                        $result2->data_seek(0); // Reset the result pointer to the beginning
                        while ($row2 = $result2->fetch_assoc()) {
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
                        
                    
                        $ratings = [5 => 0, 4 => 0, 3 => 0, 2 => 0, 1 => 0];
                        echo'</div>';
                        $result2->data_seek(0); // Reset the result pointer to the beginning
                        echo '<div class="outer-card" style="width: 75%;" >';
                        while ($row2 = $result2->fetch_assoc()) {

                            echo '<div class="review-card user-review">';
                           
                            $individualRating = $row2['rating'];
                            echo '<span class="stars" >';
                            for ($i = 1; $i <= 5; $i++) {
                                $starClass = ($i <= $individualRating) ? 'filled' : '';
                                echo '<span class="star ' . $starClass . '">&#9733;</span>';
                            }
                            echo '</span>';
                            
                            // Display details for each interaction
                            $userName = $row2['name'];
                            echo '<br>';
                            echo '<span  class="user-name"> By:  ' . $userName . '</span>';
                            echo '</p>';
                            echo '</div>';
                            ;
                            
                           
                            echo '<p>' . $row2['user_review'] . '</p>';
                            echo '<p><strong>Sentiment review: </strong>' . $row2['sentimentreview'] . '</p>';
                            
                            
                        }
                        
                        
                        
                        // Close the user-reviews container
                    
                    } else {
                        echo '<h3>Average Rating: 0.00</h3>';
                        echo 'No interaction data found.';
                        
                    }
                  
                    echo '</div><br>'; 
                    $conn->close();
                    
                    echo '</div><br>'; 

                
                } else {
                    echo 'Driver ID not provided.';
                }
                ?>
            </div>
        </div>
    </div>
            </div>
</body>
</html
