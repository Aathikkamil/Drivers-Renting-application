<?php
$nic =$_POST['nic'];
$word = $_POST['password'];

require_once ('dbcon.php');

$sql = "SELECT did, name from driver WHERE nic='$nic' AND password = '$word'";
$result = $conn->query($sql);
if ( $result->num_rows>0){
    while($row= $result->fetch_assoc()){
        session_start();
        $_SESSION["did"] =$row["did"];
        $_SESSION["name"] =$row["name"];
        echo "<meta http-equiv='refresh' content='1;URL=/driver/driverhome.php'>";
        
        
    }}
    else{
          
        echo "driver not found";
        echo "<meta http-equiv='refresh' content='1;URL=../driver/log.php'>";
       

    }

?>