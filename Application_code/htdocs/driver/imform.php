
<head>
<style>
        /* Add CSS styles for the card */
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
            border-radius: 5px;
            padding: 10px;
            background-color: rgba(255, 255, 355, 0.5);
            margin: 10px 0;
        }
        
        .card {
            border: 1px solid #ccc;
           
            max-width: 650px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
            background-color:  rgba(275, 255, 255, 0.5);
            max-width: 100%;
           
        }

        .card img {
            max-width: 100%;
            border-radius: 50%;
        }

        .card p {
            font-size: 18px;
            margin-bottom: 10px;
        }
        table {
        width: 100%;
      
        margin-bottom: 20px;
        
    }
    table .td{
    
    }
    .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007BFF; /* Button background color */
        color: #fff; /* Text color */
        text-decoration: none;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    /* Hover effect for the button */
    .btn:hover {
        background-color: #0056b3; /* Change background color on hover */
    }

    /* Center the button text */
    .btn {
        text-align: center;
    }


 
    </style>
</head>



<?php
require_once('../driversetup/head.php');
session_start();

if (isset($_SESSION["did"]) && isset($_SESSION["name"])) {
    $userName = $_SESSION["name"];
    echo '<title>Welcome, ' . $userName . '</title';

    // Database connection (you may have already included this in your setup)
    require_once('../setup/dbcon.php');

    // Get driver's profile information from the database
    $driverID = $_SESSION["did"]; 

    $sql = "SELECT name, phone, age, nic, licence, vtype, profile, address FROM driver WHERE did = $driverID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {  
            $driverName = $row["name"];
            $driverPhone = $row["phone"];
            $driverAge = $row["age"];
            $driverNIC = $row["nic"];
            $driverLicense = $row["licence"];
            $driverVehicleType = $row["vtype"];
            $driverProfile = $row["profile"];
            $driverAddress = $row["address"];
        }
    } else {
        // Handle the case where the driver's profile is not found.
    }
} else {
    header("Location: ../driver/log.php");
    exit();
}
?>

<body>
    <?php require_once('../driversetup/navbar.php'); ?>
    <br><br><br>
    <div class="container" style="width:45%">







        <div class="card">
            <div class ="inner-card">
  
            <img src="<?php echo $driverProfile; ?>" alt="Driver Profile Image"><br><br>
            <table class="user-reviews-table" style="width: 100%;">
    <tr>
        <td>Name:</td>
        <td><?php echo $driverName; ?></td>
    </tr>
    <tr>
        <td>Phone:</td>
        <td><?php echo $driverPhone; ?></td>
    </tr>
    <tr>
        <td>Age:</td>
        <td><?php echo $driverAge; ?></td>
    </tr>
    <tr>
        <td>NIC:</td>
        <td><?php echo $driverNIC; ?></td>
    </tr>
    <tr>
        <td>License:</td>
        <td><?php echo $driverLicense; ?></td>
    </tr>
    <tr>
        <td>Vehicle Type:</td>
        <td><?php echo $driverVehicleType; ?></td>
    </tr>
    <tr>
        <td>Address:</td>
        <td><?php echo $driverAddress; ?></td>
    </tr>
    <tr>
        <td colspan="2">
           <button class="btn"> <a href="../driver/driverprofile_update.php" >Edit Your Profile</a></button> 
        </td>
    </tr>
</table>


        </div>
    </div>
    </div>
</body>
</html>
