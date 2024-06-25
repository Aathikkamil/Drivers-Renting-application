<?php
$name = $_POST['name'];
$phone = $_POST['phone'];
$age = $_POST['age'];
$nic = $_POST['nic'];
$licen = $_POST['licen'];
$vtype = isset($_POST['vtype']) ? implode(',', $_POST['vtype']) : '';
$address = $_POST['address'];
$word = $_POST['password'];

// File Upload: Process the profile image upload
// File Upload: Process the profile image upload
$profileImage = ""; // Initialize the profile image path
if (isset($_FILES['profileImage']) && $_FILES['profileImage']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = '../profile_pictures/'; // Replace with the actual path
    $uploadFile = $uploadDir . basename($_FILES['profileImage']['name']);
    if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $uploadFile)) {
        $profileImage = $uploadFile;
    } else {
        // Handle the error if the file upload fails
        echo "File upload failed.";
    }
}


require_once ('../setup/dbcon.php');

// Use prepared statements to insert data securely
$sql = "INSERT INTO driver (name, phone, age, nic, licence, vtype, address, password, profile) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssissssss", $name, $phone, $age, $nic, $licen, $vtype, $address, $word, $profileImage);

if ($stmt->execute()) {
    echo "<h1>New Driver registered successfully</h1>";
    echo "<meta http-equiv='refresh' content='5;URL=../driver/index.php'>";
} else {
    echo "Error: " . $stmt->error;
}

// Get the driver ID
$sql = "SELECT did FROM driver WHERE nic=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $nic); 

if ($stmt->execute()) {
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $driverID = $row["did"];
        // You can use $driverID as needed
    }
}

$stmt->close();
$conn->close();
?>
