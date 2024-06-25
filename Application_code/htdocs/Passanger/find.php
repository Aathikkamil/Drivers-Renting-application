<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('../setup/head.php');  ?>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('../assets/bg.jpg'); /* Add the background image URL */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
        }

        #content {
            max-width: 1200px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.8); /* Adjust the last value (0.8) for opacity */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* CSS for the card style */
       .driver-card {
    border: 1px solid #ccc;
    border-radius: 5px;
    max-height: 1800px;
    padding: 10px;
    margin: 10px 0;
    box-shadow: 0 2px 5px rgba(1, 0, 0, 0.1);
    background-color: rgba(255, 255, 255, 0.8); /* Adjust the last value (0.8) for opacity */
        }

        /* CSS for individual card elements */
        .driver-card h2 {
            font-size: 18px;
            margin: 0;
            text-align:center;
           
        }

        .driver-card p {
            margin: 0;
        }

        label {
            font-weight: bold;
        }

        select, button {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 10px 0;
        }

        select {
            width: 100%;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
        table{
            border: 0px solid black;
            width: 100%;
            
        }
        table img{
            border-radius: 50%;
        }
      
td {
  width: 35%;
}

        
    </style>
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
<?php require_once('../setup/navbar.php'); ?><br><br><br>
<div id="content">
    <form method="POST" action="">
        <label for="search-address">Select your city:</label>
        <select id="search-address" name="search-address" required>
            <option value="kandy">Kandy</option>
            <option value="Nuwara Eliya">Nuwara Eliya</option>
            <option value="Matale">Matale</option>
            <option value="Gampola">Gampola</option>
            <option value="Hatton">Hatton</option>
            <option value="Dambulla">Dambulla</option>
            <option value="nawalapitiya">Nawalapitiya</option>
            <option value="Kadugannawa">Kadugannawa</option>
        </select>

        <label for ="search-vtype">your vehicle type  </label>
        <select id="search-vtype" name="search-vtype" require>
            <option value="car"> Car</option>
            <option value="van">van</option>
            <option value="truck">truck</option>
            <option value="tucktuck">tucktuck</option>
        </select>
        

        <button type="submit">Search</button>
    </form>
    <?php
    require_once('../setup/dbcon.php');

    if (isset($_POST['search-address'])) {
        $searchAddress = $_POST['search-address'];
        $vtp = $_POST['search-vtype'];
  

        // Define the SQL query to select driver details with the matching address
        // $sql = "SELECT * FROM driver WHERE address = '$searchAddress'";

        $sql = "SELECT * FROM driver WHERE address = '$searchAddress' AND vtype LIKE '%$vtp%'";
        // Execute the query
        $result = $conn->query($sql);

        if ($result) {

            // Check if there are rows returned from the query
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="driver-card">';
                   
                    echo '<h2>Driver Information</h2>';

                    echo '<table>
                    <tr>
                      <td > <strong>Driver name: </strong>' . $row['Name'] . '<br> <strong> contact number: </strong>' . $row['phone'] .
                      '<br> <strong>driven vehicle: </strong>' . $row['vtype'] . '<br> <strong>Address: </strong>' . $row['address'] . '<br> <strong>Age: </strong>' . $row['age'] . '<br> <strong>Driving experience: </strong>' . $row['experience'] . '</td>
                      <td style="text-align: center; vertical-align: middle;"> <img src="' . $row['profile'] . '" alt="Driver Profile Image" style="max-width: 50%;"> </td>
                      <td style="text-align: center; vertical-align: right;"> Price per house:' .$row['Pricing'].  ' Rs<br>
                      You Can Pay by cash 
                      </td>
                    </tr>
                  </table>';
            




                    
                       
                       
                       
                       
                        echo '<a href="driversprofiles.php?driverID=' . $row['did'] . '" class="btn btn-primary">Select this Dtiver</a>';

                    echo '</div>';
                }
            } else {
                echo 'No data found.';
            }
        } else {
            echo 'Error executing the query: ' . $conn->error;
        }

    }

    $conn->close();
    ?>

    
</div>
</body>
</html>
