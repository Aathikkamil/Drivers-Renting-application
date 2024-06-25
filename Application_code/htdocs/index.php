<html lang="en">
<head>
    <?php require_once('setup/head.php');?>
</head>
<body>
<?php
if (isset($_GET['page'])) {
    $body = 'Passanger/' . $_GET['page'] . '.php';
   

}else {
    $body = 'login_form.php';
   
}



?>


<?php require_once($body);?>
<?php require_once('setup/dbcon.php') ?>
</body>
</html>
