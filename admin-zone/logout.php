<?php
// remove all session variables
session_start(); # NOTE THE SESSION START
$_SESSION = array();
session_unset(); 

// destroy the session 
session_destroy(); 
header('Location: index.php');
?>