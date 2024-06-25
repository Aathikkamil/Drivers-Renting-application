<html lang="en">
<head>
    <?php require_once('../setup/head.php'); ?>
    <style>
        /* CSS for the card style */
        .driver-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        /* CSS for individual card elements */
        .driver-card h2 {
            font-size: 18px;
            margin: 0;
        }

        .driver-card p {
            margin: 0;
        }
    </style>
</head>
<body>
    

<?php require_once('../setup/navbar.php'); ?>
<br><br>
<?php
require_once('../setup/dbcon.php');

// Define the SQL query to select the desired fields
$sql = "SELECT dui.*, u.*, d.* FROM driver_user_intraction dui INNER JOIN user u ON dui.id = u.id INNER JOIN driver d ON dui.did = d.did";
// Execute the query
$result = $conn->query($sql);

if ($result) {
    echo '<h1>Drivers</h1>';

    // Check if there are rows returned from the query
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="driver-card">';
            echo '<table style="width: 100%;">';//table
            echo '<tr>';
            echo '<td style="width: 33.33%;">';
            echo '<h1>Driver Information</h1>';
            echo '</td>';
            echo '<td style="width: 33.33%; border: 1px solid black">';
            echo '<p><strong>Driver name: </strong>'  .$row['Name']. '<br> <strong> Driving Experience: </strong>'. $row['experience'].   '<br>
            <strong>passanger name: </strong>'  .$row['name']. '<br> <strong>drived vehical: </strong>' .$row['vtype'].  '</p>';
            echo '</td>';
            echo '<td style="width: 33.33%; border: 2px solid black" >     ';
            
            echo '   <table  style="border: 1px solid black; width: 100%;"> ';
            echo '<tr>
            <td style="border: 1px solid black; text-align: center;" colspan="2"><strong>passanger name: </strong>'  .$row['name'].'</td>
             </tr> ';
             echo '<tr>
             <td style="border: 1px solid black"colspan="2"><strong> review: </strong>' .$row['user_review'].'</td>
              </tr> ';
              echo '<tr>
              <td style="border: 1px solid black; width: 50%;">Row 3, Column 1</td>
              <td style="border: 1px solid black; width: 50%;">Row 3, Column 2</td>
          </tr>';
            echo '   </table> ';

            echo '</td>';

            echo '   </tr>'; 
            echo '   </table>';
            echo '</div>';
                 }
    } else {
        echo 'No data found.';
    }
} else {
    echo 'Error executing the query: ' . $conn->error;
}

// Close the database connection
$conn->close();
?>





    </tr>
</table>

</body>
</html>
