<?php
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['password'];


require_once ('dbcon.php');


$sql = "INSERT INTO `user` (`name`, `email`, `password`) VALUES ('$name', '$email', '$pass')";

if ($conn->query($sql)===TRUE){
    echo("<h1>"); echo "New user registered successfully"; echo("</h1>");
     echo "<meta http-equiv='refresh' content='5;URL=../index.php'>";
 
   }else{
       echo "Error: " . $sql . "<br>" . $conn->error;
       
   }
 // get the user id 
 
   $sql = "SELECT id FROM user  WHERE email='$email'";
 
   $result = $conn->query($sql);
  
 
 


?>