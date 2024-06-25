<?php
session_start();
require_once('../setup/dbcon.php');

// Check if the user is logged in, if not, redirect to the login page
if (!isset($_SESSION["id"])) {
    header("Location: ../index.php");
    exit;
}

    

// Check if the requestID is set in the URL parameters
if (isset($_GET['requestID'])) {
    $_SESSION['requestID'] = $_GET['requestID'];


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('../setup/head.php') ?>
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
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            height: 100vh; /* Make the container fill the viewport height */
        }


        .card {
            width: 48%; /* Adjust the width as needed */
            border: 1px solid #ccc;
            padding: 10px;
            margin: 5px;
            text-align: center;
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
            border-radius: 15px;
            padding: 10px;
            background-color: rgba(755, 255, 355, 0.5);
            margin: 10px 0;
        }

        p {
            color: #555;
        }

        /* Set the width and height of the inner-card to 50% */
        .inner-card {
            width: 50%;
            height: 50%;
            padding: 10px; /* You can adjust this padding as needed */
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
    <?php require_once('../setup/navbar.php'); ?><br><br>
    <div class="container">
        <div class="card">
            <img src="../assets/drivers.png" class="card-img-top" alt="Card Image 1">
            <h1 class="card-title">Book a Driver</h1>
            <p class="card-text">You can search for a driver for your own vehicle.</p>
            <a href="find.php" class="btn">Book a driver</a>
        </div>
     
    </div>
</body>
</html>
