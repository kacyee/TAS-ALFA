<?php
if( !isset( $_SESSION ) ) session_start();
if(empty($_SESSION['user'])){
    header('Location: ./login.php');
}
else{
    $user=$_SESSION['user'];
    $post_id=$_SESSION['post_id'];
}
include "../settings/db_connect.php";
$text=$_POST['post_text'];
$meta_desc=$_POST['meta_desc'];
$title=$_POST['title'];
$mod_date=date("Y-m-d H:i:s");
$sql = $mysqli->prepare("UPDATE post SET tytul=?,opis=?,tekst=?,data_modyfikacji=? WHERE post_id=?;");
if ($sql)
{
        $sql->bind_param("ssssi",$title,$meta_desc,$text,$mod_date,$post_id);
        $sql->execute();
        $sql->close();
}
$mysqli->close();

header ("Location: ./");
?>