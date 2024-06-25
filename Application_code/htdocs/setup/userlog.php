<?php
$email = $_POST['email'];
$pass = $_POST['password'];

require_once ('dbcon.php');

$sql = "SELECT id, name from user WHERE email='$email' AND password = '$pass'";
$result = $conn->query($sql);
if ( $result->num_rows>0){
    while($row= $result->fetch_assoc()){
        session_start();
        $_SESSION["id"] =$row["id"];
        $_SESSION["name"] =$row["name"];
        
        echo "<meta http-equiv='refresh' content='1;URL=/Passanger/passanger_home.php'>";
        
        
}}
else{
          
          echo "User not found";
          echo "<meta http-equiv='refresh' content='1;URL=../index.php'>";
         

      }

      ?>
        



     





