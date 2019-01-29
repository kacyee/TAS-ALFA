<?php
 if( !isset( $_SESSION ) ) session_start();
if(empty($_SESSION['user'])){
    header('Location: login.php');
}
include "../settings/db_connect.php";
$id_post = $_GET['post_id']; //wczytanie z tablicy _GET ze sprawdzeniem czy niepusty
if ($sql = $mysqli->prepare( "DELETE FROM post WHERE post_id= ?;" ))
{
 $sql->bind_param( "i", $id_post);
 $sql->execute();
 $sql->close();
}
$mysqli->close();
header ("Location: index.php" );
?>