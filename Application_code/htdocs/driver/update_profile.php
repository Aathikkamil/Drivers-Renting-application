<?php
session_start();
if (isset($_SESSION["did"]) && isset($_SESSION["name"])) {
    $userName = $_SESSION["name"];
    echo '<title>Welcome, ' . $userName . '</title';

    // Database connection (you may have already included this in your setup)
    require_once('../setup/dbcon.php');

    $driverID = $_SESSION["did"];
    $phone = $_POST["phone"];
    $age = $_POST["age"];
    $vtype = isset($_POST['vtype']) ? implode(',', $_POST['vtype']) : '';
    $profile = ''; // Define and set the profile variable.
    $address = $_POST["address"];
    $word = $_POST['password'];
 
    $profileImage = ""; // Initialize the profile image path
if (isset($_FILES['profileImage']) && $_FILES['profileImage']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = '../profile_pictures/'; // Replace with the actual path
    $uploadFile = $uploadDir . basename($_FILES['profileImage']['name']);
    if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $uploadFile)) {
        $profileImage = $uploadFile;
    } else {
        // Handle the error if the file upload fails
        echo "File upload failed: " . $_FILES['profileImage']['error'];
    }
}
    
    // Prepare the SQL statement
    $sql = "UPDATE `driver` SET `phone` = ?, `age` = ?, `vtype` = ?, `profile` = ?, `address` = ?, `password` = ? WHERE `did` = ?";


    $stmt = $conn->prepare($sql);

    // Bind the parameters
    $stmt->bind_param("ssssssi", $phone, $age, $vtype, $profileImage, $address, $word, $driverID);


    // Execute the statement
    if ($stmt->execute()) {
        echo "<h1>Update successful</h1>";
        echo "<meta http-equiv='refresh' content='5;URL=../driver/driverhome.php'>";
    } else {
        echo "Update failed: " . $stmt->error;
        echo "Update incorrect";
    }
}
?>
