<?php
function load($zmienna)
{
           if (!isset($_GET[$variable]) || $_GET[$variable]=="")
                die( "Error! Variable not found: ".$variable ); // Variable not found
           return $_GET[$variable];
}


$mysqli = new mysqli("localhost", "root", "", "bloggero");
if (mysqli_connect_errno())  die( "Error: ".mysqli_connect_error() );
mysqli_set_charset( $mysqli, 'utf8');
?>