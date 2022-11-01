<?php

session_start();
unset($_SESSION['username']);   
session_unset();
session_destroy();
$_SESSION = array();

header("Location: index.php");
exit;
?>