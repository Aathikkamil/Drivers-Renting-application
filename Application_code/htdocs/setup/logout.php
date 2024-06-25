<?php
session_start();
$_SESSION['id'] = null;
$_SESSION['email'] = null;

session_unset();
session_destroy();





echo '<meta http-equiv="refresh" content="1;URL=../login_form.php">';
?>
