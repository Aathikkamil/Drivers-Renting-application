<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('../setup/head.php') ?>
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
            padding: 0; 
        }

        .container {
            max-width: 90%;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.5); /* Adjust the last value (0.5) for transparency */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
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

        .inner-card {
            border: 1px solid #ccc;
            max-width: 100%;
            border-radius: 15px;
            padding: 20px; /* Increase the padding to make the cards bigger */
            background-color: rgba(755, 255, 355, 0.5);
            margin: 10px 0;
        }

        p {
            color: #555;
        }

        /* Set the width and height of the inner-card to 50% */
        .inner-card {
      /* Increase the width to make the cards bigger */
            height: 600px; /* Increase the height to make the cards bigger */
            padding: 20px; /* You can adjust this padding as needed */
            margin: 10px auto; /* Center the card horizontally */
        }

        .btn {
            display: block; /* Set display to block to take up full width */
            margin: 0 auto; /* Auto margins horizontally center the button */
            padding: 10px 20px;
            background-color: #34495E;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
    </style>
</head>
<body>
<?php
    session_start();
    if(!isset($_SESSION["did"])){
      echo '<h2>  User not logedin  </h2>';
      echo ' <h3> Plese Login First   </h3>';
      echo ' <meta thhp-equvi="refresh" content =1";URL=../index.php/>';
      die;
    
    }
    
    if (isset($_GET['driverID'])) {
        $driverID = $_GET['driverID'];
        
    } else {
        echo 'Driver ID not provided.';
    }


      ?>
   
    <?php require_once('../driversetup/navbar.php'); ?><br><br><br>



    <div class="container">
        
   
        <div class="row">
            <!-- Card 1 -->
            <div class="col-md-4">
                <div class="inner-card">
                    <img src="../assets/noti.jpg" class="card-img-top" alt="Card Image 1">
                    <h1 class="card-title">Booking requests</h1>
                    <p class="card-text">This is a description for Card 1.</p>
                    <a href="../driver/booking_request.php" class="btn">Requests </a>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4">
                <div class="inner-card">
                    <img src="../assets/review.jpg" class="card-img-top" alt="Card Image 2">
                    <h1 class="card-title">check your reviews  </h1>
                    <p class= "card-text">This is a description for Card 2.</p>
                    <a href="../driver/viewreviews.php" class="btn">Check</a>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4">
                <div class="inner-card">
                    <img src="../assets/edt.jpg" class="card-img-top" alt="Card Image 3">
                    <h1 class="card-title">Edite your Profile</h1>
                    <p class="card-text">This is a description for Card 3.</p>
                    <a href="../driver/driverprofile_update.php" class="btn">Edite your profile</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
